<?php

namespace MJKruszewski\PlumbokBundle\DependencyInjection;


use Plumbok\Cache\FileCache;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class PlumbokExtension extends ConfigurableExtension
{

    /**
     * Configures the passed container according to the merged configuration.
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $plumbokCacheDir = $mergedConfig['dir'] ?? $mergedConfig['default']['dir'];
        $plumbokNamespaces = $mergedConfig['namespaces'] ?? [];

        $fileCache = new FileCache($plumbokCacheDir);

        foreach ($plumbokNamespaces as $namespace) {
            \Plumbok\Autoload::register($namespace, $fileCache);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias(): string
    {
        return 'pb_plumbok';
    }
}