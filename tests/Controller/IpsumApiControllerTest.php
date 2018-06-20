<?php
/**
 * Created by PhpStorm.
 * User: icamara
 * Date: 20/06/18
 * Time: 12:00
 */

namespace KnpU\LoremIpsumIbrahBundle\Tests\Controller;


use KnpU\LoremIpsumIbrahBundle\KnpULoremIpsumIbrahBundle;
use KnpU\LoremIpsumIbrahBundle\Tests\KnpULoremIpsumTestingKernel;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class IpsumApiControllerTest extends TestCase
{

    public function testIndex()
    {
       $kernel = new KnpULoremIpsumControllerKernel();
       $client = new Client($kernel);
       $client->request('GET', '/api/');

       $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}

class KnpULoremIpsumControllerKernel extends Kernel {

    use MicroKernelTrait;

    public function __construct()
    {
        parent::__construct('test', true);
    }


    public function registerBundles()
    {
        return [
            new KnpULoremIpsumIbrahBundle(),
            new FrameworkBundle(),
        ];
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import(__DIR__.'/../../src/Resources/config/routes.xml', '/api');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
       $c->loadFromExtension('framework', [
           'secret' => 'F00ISC'
       ]);
    }


    public function getCacheDir()
    {
        return __DIR__.'/cache/'.spl_object_hash($this);
    }


}