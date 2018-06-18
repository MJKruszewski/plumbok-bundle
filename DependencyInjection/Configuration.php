<?php

namespace MJKruszewski\PlumbokBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $builder
            ->root('pb_plumbok')
                ->children()
                    ->scalarNode('dir')
                        ->defaultValue('%kernel.cache_dir%/plumbok')
                    ->end()
                         ->arrayNode('namespaces')->prototype('variable')
                    ->end()
                ->end()
            ->end();

        return $builder;
    }
}