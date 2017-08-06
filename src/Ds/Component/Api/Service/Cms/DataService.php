<?php

namespace Ds\Component\Api\Service\Cms;

use Ds\Component\Api\Model\Cms\Data;
use Ds\Component\Api\Query\Cms\DataParameters as Parameters;
use Ds\Component\Api\Service\AbstractService;

/**
 * Class DataService
 *
 * @package Ds\Component\Api
 */
class DataService extends AbstractService
{
    /**
     * @const string
     */
    const MODEL = Data::class;

    /**
     * @const string
     */
    const RESOURCE_LIST = '/datas';
    const RESOURCE_OBJECT = '/datas/{id}';

    /**
     * @var array
     */
    protected static $map = [
        'id',
        'uuid'
    ];

    /**
     * Get data list
     *
     * @param \Ds\Component\Api\Query\Cms\DataParameters $parameters
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
