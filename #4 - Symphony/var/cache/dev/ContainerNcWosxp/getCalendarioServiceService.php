<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'App\Service\Google\CalendarioService' shared autowired service.

include_once $this->targetDirs[3].'/src/Service/Google/AdminConsoleService.php';
include_once $this->targetDirs[3].'/src/Service/Google/CalendarioService.php';

return $this->privates['App\Service\Google\CalendarioService'] = new \App\Service\Google\CalendarioService(($this->privates['Google_Client'] ?? $this->load('getGoogleClientService.php')));
