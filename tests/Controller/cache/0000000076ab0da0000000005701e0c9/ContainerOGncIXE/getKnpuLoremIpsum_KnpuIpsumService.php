<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'knpu_lorem_ipsum.knpu_ipsum' shared service.

return $this->services['knpu_lorem_ipsum.knpu_ipsum'] = new \KnpU\LoremIpsumIbrahBundle\KnpUIpsum(($this->services['knpu_lorem_ipsum.knpu_word_provider'] ?? $this->services['knpu_lorem_ipsum.knpu_word_provider'] = new \KnpU\LoremIpsumIbrahBundle\KnpUWordProvider()), true, 3);
