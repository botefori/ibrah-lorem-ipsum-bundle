<?php
declare(strict_types=1);

namespace KnpU\LoremIpsumIbrahBundle\Tests;

use KnpU\LoremIpsumIbrahBundle\KnpUIpsum;
use KnpU\LoremIpsumIbrahBundle\KnpULoremIpsumIbrahBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class FunctionalTest extends TestCase
{

    public function testServiceWiring()
    {
       $kernel = new KnpULoremIpsumTestingKernel('test', true);
       $kernel->boot();
       $container = $kernel->getContainer();

       $ipsum = $container->get('knpu_lorem_ipsum.knpu_ipsum');
       $this->assertInstanceOf(KnpUIpsum::class, $ipsum);
       $this->assertInternalType('string', $ipsum->getParagraphs());
    }
}

class KnpULoremIpsumTestingKernel extends Kernel{


    public function registerBundles()
    {
        return [
            new KnpULoremIpsumIbrahBundle()
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        // TODO: Implement registerContainerConfiguration() method.
    }

}