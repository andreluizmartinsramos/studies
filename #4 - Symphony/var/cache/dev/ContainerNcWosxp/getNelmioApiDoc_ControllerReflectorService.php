<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'nelmio_api_doc.controller_reflector' shared service.

include_once $this->targetDirs[3].'/vendor/nelmio/api-doc-bundle/Util/ControllerReflector.php';

return $this->privates['nelmio_api_doc.controller_reflector'] = new \Nelmio\ApiDocBundle\Util\ControllerReflector($this, ($this->privates['controller_name_converter'] ?? $this->privates['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel')))));