<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOGncIXE\ControllerTestDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOGncIXE/ControllerTestDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerOGncIXE.legacy');

    return;
}

if (!\class_exists(ControllerTestDebugProjectContainer::class, false)) {
    \class_alias(\ContainerOGncIXE\ControllerTestDebugProjectContainer::class, ControllerTestDebugProjectContainer::class, false);
}

return new \ContainerOGncIXE\ControllerTestDebugProjectContainer(array(
    'container.build_hash' => 'OGncIXE',
    'container.build_id' => '28c4cf0b',
    'container.build_time' => 1529498558,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerOGncIXE');
