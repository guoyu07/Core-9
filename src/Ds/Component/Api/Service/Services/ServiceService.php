<?php

namespace Ds\Component\Api\Service\Services;

use Ds\Component\Api\Service\AbstractService;
use Ds\Component\Api\Model\Identities\Staff;
use Ds\Component\Api\Query\Identities\StaffParameters as Parameters;

/**
 * Class ServiceService
 */
class ServiceService extends AbstractService
{
    /**
     * @const string
     */
    const MODEL = Service::class;

    /**
     * @const string
     */
    const RESOURCE_LIST = '/service';
    const RESOURCE_OBJECT = '/service/{id}';

    /**
     * @var array
     */
    protected static $map = [
        'id',
        'uuid'
    ];

    /**
     * Get individual list
     *
     * @param \Ds\Component\Api\Query\Services\ServiceParameters $parameters
     * @return array
     */
    public function getList(Parameters $parameters = null)
    {
        $objects = $this->execute('GET', 'http://www.mocky.io/v2/592b798d100000b10e389778');
        $list = [];

        foreach ($objects as $object) {
            $model = static::toModel($object);
            $list[] = $model;
        }

        return $list;
    }
}