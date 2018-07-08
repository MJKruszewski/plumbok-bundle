<?php

namespace MJKruszewski\PlumbokBundle\DependencyInjection;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class PlumbokExtension extends ConfigurableExtension
{

    /**
     * {@inheritdoc}
     */
    public function getAlias(): string
    {
        return 'plumbok';
    }

    /**
     * Configures the passed container according to the merged configuration.
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        foreach ($mergedConfig as $name => $value) {
            $container->setParameter(
                'plumbok.' . $name,
                $value
            );
        }
    }
}