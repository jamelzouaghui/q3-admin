<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'nelmio_api_doc.form.extension.description_form_type_extension' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/FormTypeExtensionInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/AbstractTypeExtension.php';
include_once $this->targetDirs[3].'/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Form/Extension/DescriptionFormTypeExtension.php';

return $this->services['nelmio_api_doc.form.extension.description_form_type_extension'] = new \Nelmio\ApiDocBundle\Form\Extension\DescriptionFormTypeExtension();