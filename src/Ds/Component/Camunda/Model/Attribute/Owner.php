<?php

namespace Ds\Component\Camunda\Model\Attribute;

/**
 * Trait Owner
 *
 * @package Ds\Component\Camunda
 */
trait Owner
{
    /**
     * @var string
     */
    protected $owner; # region accessors

    /**
     * Set owner
     *
     * @param string $owner
     * @return object
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    # endregion
}
