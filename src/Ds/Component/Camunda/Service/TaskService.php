<?php

namespace Ds\Component\Camunda\Service;

use Ds\Component\Camunda\Model\Task;
use Ds\Component\Camunda\Query\TaskParameters as Parameters;

/**
 * Class TaskService
 *
 * @package Ds\Component\Camunda
 */
class TaskService extends AbstractService
{
    /**
     * @const string
     */
    const MODEL = Task::class;

    /**
     * @const string
     */
    const TASK_LIST = '/task';
    const TASK_COUNT = '/task/count';
    const TASK_OBJECT = '/task/{id}';

    /**
     * @var array
     */
    protected static $map = [
        'id',
        'name',
        'assignee',
        'created',
        'due',
        'followUp',
        'delegationState',
        'description',
        'executionId',
        'owner',
        'parentTaskId',
        'priority',
        'processDefinitionId',
        'processInstanceId',
        'caseExecutionId',
        'caseDefinitionId',
        'caseInstanceId',
        'taskDefinitionKey',
        'formKey',
        'tenantId'
    ];

    /**
     * {@inheritdoc}
     */
    public function getList(Parameters $parameters = null)
    {
        $objects = $this->execute('GET', static::TASK_LIST);
        $list = [];

        foreach ($objects as $object) {
            $model = static::toModel($object);
            $list[] = $model;
        }

        return $list;
    }

    /**
     * {@inheritdoc}
     */
    public function getCount(Parameters $parameters = null)
    {
        $result = $this->execute('GET', static::TASK_COUNT);

        return $result->count;
    }

    /**
     * {@inheritdoc}
     */
    public function get($id, Parameters $parameters = null)
    {
        $resource = str_replace('{id}', $id, static::TASK_OBJECT);
        $object = $this->execute('GET', $resource);
        $model = static::toModel($object);

        return $model;
    }
}