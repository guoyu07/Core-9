<?php

namespace Ds\Component\Api\Bridge\Symfony\Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Ds\Component\Config\Fixture\ORM\ConfigFixture;

/**
 * Class Configs
 */
class Configs extends ConfigFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 0;
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return __DIR__.'/../../Resources/data/{env}/configs.yml';
    }
}
