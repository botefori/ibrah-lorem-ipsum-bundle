<?php

declare(strict_types=1);

namespace KnpU\LoremIpsumIbrahBundle;


use KnpU\LoremIpsumIbrahBundle\DependencyInjection\Compiler\WordProviderCompilerPass;
use KnpU\LoremIpsumIbrahBundle\DependencyInjection\KnpULoremIpsumIbrahExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class KnpULoremIpsumIbrahBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new WordProviderCompilerPass());
    }

    public function getContainerExtension()
    {
       if(null ===  $this->extension){
           $this->extension = new KnpULoremIpsumIbrahExtension();
       }

       return $this->extension;
    }

}