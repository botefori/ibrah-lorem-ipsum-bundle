<?php

declare(strict_types=1);

namespace KnpU\LoremIpsumIbrahBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class KnpULoremIpsumIbrahExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
       $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
       $loader->load('services.xml');



       $configuration = $this->getConfiguration($configs, $container);
       $config = $this->processConfiguration($configuration, $configs);
       $definition = $container->getDefinition('knpu_lorem_ipsum.knpu_ipsum');

       if(null !== $config['word_provider']){
           $container->setAlias('knpu_lorem_ipsum.kpnu_word_provider', $config['word_provider']);

       }
       $definition->setArgument(1, $config['unicorns_are_real']);
       $definition->setArgument(2, $config['min_sunshine']);
    }

    public function getAlias()
    {
        return 'knpu_lorem_ipsum';
    }



}