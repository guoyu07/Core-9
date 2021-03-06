<?php

namespace Ds\Component\Model\Attribute\Accessor;

use DateTime;

/**
 * Trait CreatedAt
 *
 * @package Ds\Component\Model
 */
trait UpdatedAt
{
    /**
     * Set updated at date
     *
     * @param \DateTime $updatedAt
     * @return object
     */
    public function setUpdatedAt(DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updated at date
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
