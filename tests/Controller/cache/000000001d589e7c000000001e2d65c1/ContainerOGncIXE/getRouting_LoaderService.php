<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'routing.loader' shared service.

$a = ($this->services['kernel'] ?? $this->get('kernel'));

$b = new \Symfony\Component\HttpKernel\Config\FileLocator($a, ($this->targetDirs[2].'/Resources'), array(0 => $this->targetDirs[2]));

$c = new \Symfony\Component\Config\Loader\LoaderResolver();
$c->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($b));
$c->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($b));
$c->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($b));
$c->addLoader(new \Symfony\Component\Routing\Loader\GlobFileLoader($b));
$c->addLoader(new \Symfony\Component\Routing\Loader\DirectoryLoader($b));
$c->addLoader(new \Symfony\Component\Routing\Loader\DependencyInjection\ServiceRouterLoader($this));

return $this->services['routing.loader'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader(($this->privates['controller_name_converter'] ?? $this->privates['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($a)), $c);