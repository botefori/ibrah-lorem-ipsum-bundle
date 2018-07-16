<?php
/**
 * Created by PhpStorm.
 * User: icamara
 * Date: 28/06/18
 * Time: 11:37
 */

namespace KnpU\LoremIpsumIbrahBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class WordProviderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('knpu_lorem_ipsum.knpu_ipsum');
        $references = array();
        foreach ($container->findTaggedServiceIds('knpu_ipsum_word_provider') as $id => $tags){
            $references[] = new Reference($id);
        }

        $definition->getArgument(0, $references);
    }

}