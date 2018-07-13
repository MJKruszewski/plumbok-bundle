<?php

namespace MJKruszewski\PlumbokBundle\DependencyInjection;


use Plumbok\Cache\FileCache;
use Plumbok\Command\CompileCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;
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
     * @throws \Exception
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        foreach ($mergedConfig as $name => $value) {
            $container->setParameter(
                'plumbok.' . $name,
                $value
            );
        }
        $this->generatePlumbokCache($mergedConfig, $container);
    }

    /**
     * @param array $mergedConfig
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    protected function generatePlumbokCache(array $mergedConfig, ContainerBuilder $container): void
    {
        @mkdir($mergedConfig['dir'], 0775, true);
        $application = new Application();
        $application->setAutoExit(false);
        $application->add(new CompileCommand());

        $srcPath = $container->getParameter('kernel.root_dir');
        $application->run(new StringInput("compile {$srcPath} {$mergedConfig['dir']}"), new NullOutput());
    }
}