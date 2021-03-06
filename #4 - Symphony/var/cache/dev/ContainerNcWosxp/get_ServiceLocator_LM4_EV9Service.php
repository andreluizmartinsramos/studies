<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.LM4.eV9' shared service.

return $this->privates['.service_locator.LM4.eV9'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('cursoManager' => function (): \App\Manager\CursoManager {
    return ($this->privates['App\Manager\CursoManager'] ?? $this->privates['App\Manager\CursoManager'] = new \App\Manager\CursoManager());
}, 'cursoService' => function (): \App\Service\Google\CursoService {
    return ($this->privates['App\Service\Google\CursoService'] ?? $this->load('getCursoServiceService.php'));
}, 'jsonApiResponse' => function (): \App\Utils\JsonApiResponse {
    return ($this->privates['App\Utils\JsonApiResponse'] ?? $this->load('getJsonApiResponseService.php'));
}));
