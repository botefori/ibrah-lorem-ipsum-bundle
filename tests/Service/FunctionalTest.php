<?php
declare(strict_types=1);

namespace KnpU\LoremIpsumIbrahBundle\Tests;

use KnpU\LoremIpsumIbrahBundle\KnpUIpsum;
use KnpU\LoremIpsumIbrahBundle\KnpULoremIpsumIbrahBundle;
use KnpU\LoremIpsumIbrahBundle\WordProviderInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class FunctionalTest extends TestCase
{

    public function testServiceWiring()
    {
       $kernel = new KnpULoremIpsumTestingKernel();
       $kernel->boot();
       $container = $kernel->getContainer();

       $ipsum = $container->get('knpu_lorem_ipsum.knpu_ipsum');
       $this->assertInstanceOf(KnpUIpsum::class, $ipsum);
       $this->assertInternalType('string', $ipsum->getParagraphs());
    }

    public function testServiceWiringWuthConfiguration()
    {
       $kernel = new KnpULoremIpsumTestingKernel([
           'word_provider' =>'stub_world_list',
       ]);
       $kernel->boot();
       $container = $kernel->getContainer();

       $ipsum = $container->get('knpu_lorem_ipsum.knpu_ipsum');
       $this->assertContains('stub', $ipsum->getWords(2));
    }
}

class KnpULoremIpsumTestingKernel extends Kernel{

    private $knpUIpsumConfig;

    public function __construct(array $knpUIpsumConfig = [])
    {
        $this->knpUIpsumConfig = $knpUIpsumConfig;
        parent::__construct('test', true);
    }


    public function registerBundles()
    {
        return [
            new KnpULoremIpsumIbrahBundle()
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function(ContainerBuilder $container){
             $container->register('stub_world_list', StubWordList::class);

             $container->loadFromExtension('knpu_lorem_ipsum', $this->knpUIpsumConfig);
        });
    }

    public function getCacheDir()
    {
        return __DIR__.'/cache/'.spl_object_hash($this);
    }


}

class StubWordList implements WordProviderInterface
{
    public function getWordList(): array
    {
       return [
           'stub',
           'stub2'
       ];
    }

}