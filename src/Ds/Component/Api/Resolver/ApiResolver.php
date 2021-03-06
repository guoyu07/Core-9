<?php

namespace Ds\Component\Api\Resolver;

use Ds\Component\Api\Api\Api;
use Ds\Component\Resolver\Exception\UnresolvedException;
use Ds\Component\Resolver\Resolver\Resolver;
use Exception;
use OutOfRangeException;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Class ApiResolver
 *
 * @package Ds\Component\Api
 */
class ApiResolver implements Resolver
{
    /**
     * @const string
     */
    const PATTERN = '/^ds\.([_a-zA-Z0-9]+)\.([_a-zA-Z0-9]+)\[([-a-zA-Z0-9]+)\]\.(.+)/';

    /**
     * @var \Ds\Component\Api\Api\Api
     */
    protected $api;

    /**
     * Constructor
     *
     * @param \Ds\Component\Api\Api\Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * {@inheritdoc}
     */
    public function isMatch($variable, array &$matches = [])
    {
        if (!preg_match(static::PATTERN, $variable, $matches)) {
            return false;
        }

        $service = $matches[1];
        $resource = $matches[2];

        try {
            $this->api->get($service.'.'.$resource);
        } catch (OutOfRangeException $exception) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($variable)
    {
        $matches = [];

        if (!$this->isMatch($variable, $matches)) {
            throw new UnresolvedException('Variable pattern is not valid.');
        }

        $service = $matches[1];
        $resource = $matches[2];
        $id = $matches[3];
        $property = $matches[4];
        $model = $this->api->get($service.'.'.$resource)->get($id);
        $accessor = PropertyAccess::createPropertyAccessor();

        try {
            $value = $accessor->getValue($model, $property);
        } catch (Exception $exception) {
            throw new UnresolvedException('Variable pattern is not valid.', 0, $exception);
        }

        return $value;
    }
}
