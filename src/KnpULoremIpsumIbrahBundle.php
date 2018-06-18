<?php

declare(strict_types=1);

namespace KnpU\LoremIpsumIbrahBundle;


use KnpU\LoremIpsumIbrahBundle\DependencyInjection\KnpULoremIpsumIbrahExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class KnpULoremIpsumIbrahBundle extends Bundle
{
    public function getContainerExtension()
    {
       if(null ===  $this->extension){
           $this->extension = new KnpULoremIpsumIbrahExtension();
       }

       return $this->extension;
    }

}