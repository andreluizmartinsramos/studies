<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.xOtYFb0' shared service.

return $this->privates['.service_locator.xOtYFb0'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('cursoService' => function (): \App\Service\Google\CursoService {
    return ($this->privates['App\Service\Google\CursoService'] ?? $this->load('getCursoServiceService.php'));
}, 'jsonApiResponse' => function (): \App\Utils\JsonApiResponse {
    return ($this->privates['App\Utils\JsonApiResponse'] ?? $this->load('getJsonApiResponseService.php'));
}, 'userBusiness' => function (): \App\Business\UserBusiness {
    return ($this->privates['App\Business\UserBusiness'] ?? $this->load('getUserBusinessService.php'));
}));
