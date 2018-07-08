<?php

namespace MJKruszewski\PlumbokBundle;


use MJKruszewski\PlumbokBundle\DependencyInjection\PlumbokExtension;
use Plumbok\Cache\FileCache;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PlumbokBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new PlumbokExtension();
    }


    public function boot()
    {
        $fileCache = new FileCache($this->container->getParameter('plumbok.dir'));

        foreach ($this->container->getParameter('plumbok.namespaces') as $namespace) {
            \Plumbok\Autoload::register($namespace, $fileCache);
        }
    }
}