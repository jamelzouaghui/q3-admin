<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'translation.loader.po' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Translation/Loader/LoaderInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Translation/Loader/ArrayLoader.php';
include_once $this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Translation/Loader/FileLoader.php';
include_once $this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Translation/Loader/PoFileLoader.php';

return $this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader();
