<?php

namespace Ds\Component\Camunda\Model\Attribute;

/**
 * Trait CaseInstanceId
 *
 * @package Ds\Component\Camunda
 */
trait CaseInstanceId
{
    /**
     * @var string
     */
    protected $caseInstanceId; # region accessors

    /**
     * Set case instance id
     *
     * @param string $caseInstanceId
     * @return object
     */
    public function setCaseInstanceId($caseInstanceId)
    {
        $this->caseInstanceId = $caseInstanceId;

        return $this;
    }

    /**
     * Get case instance id
     *
     * @return string
     */
    public function getCaseInstanceId()
    {
        return $this->caseInstanceId;
    }

    # endregion
}
