<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'App\Manager\UsuarioManager' shared autowired service.

include_once $this->targetDirs[3].'/src/Manager/UsuarioManager.php';

return $this->privates['App\Manager\UsuarioManager'] = new \App\Manager\UsuarioManager(($this->services['doctrine.orm.default_entity_manager'] ?? $this->load('getDoctrine_Orm_DefaultEntityManagerService.php')));