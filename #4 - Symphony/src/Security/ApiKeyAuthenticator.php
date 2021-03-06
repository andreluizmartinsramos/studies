<?php
/**
 * Created by PhpStorm.
 * User: rafael.s.ribeiro
 * Date: 03/04/2018
 * Time: 10:59
 */

namespace App\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\SimplePreAuthenticatorInterface;

class ApiKeyAuthenticator implements SimplePreAuthenticatorInterface, AuthenticationFailureHandlerInterface
{
    public function createToken(Request $request, $providerKey) {
        $apiKeyQuery = $request->query->get('Authorization');
        $apiKeyHeader = $request->headers->get('Authorization');

        $apiKey = $apiKeyHeader ? $apiKeyHeader : $apiKeyQuery;

        if (!$apiKey) {
            throw new BadCredentialsException();
        }

        return new PreAuthenticatedToken('anon.', $apiKey, $providerKey);
    }

    public function supportsToken(TokenInterface $token, $providerKey) {
        return $token instanceof PreAuthenticatedToken && $token->getProviderKey() === $providerKey;
    }

    public function authenticateToken(TokenInterface $token, UserProviderInterface $userProvider, $providerKey) {
        if (!$userProvider instanceof ApiKeyUserProvider) {
            throw new \InvalidArgumentException(
                sprintf('The user provider must be an instance of ApiKeyUserProvider (%s was given).', get_class($userProvider)
                )
            );
        }

        $apiKey = $token->getCredentials();
        $username = $userProvider->getUsernameForApiKey($apiKey);

        // User is the Entity which represents your user
        $user = $token->getUser();

        if ($user instanceof User) {
            return new PreAuthenticatedToken($user, $apiKey, $providerKey, $user->getRoles());
        }

        if (!$username) {
            // this message will be returned to the client
            throw new CustomUserMessageAuthenticationException(
                sprintf('Authorization Key "%s" does not exist.', $apiKey)
            );
        }

        $user = $userProvider->loadUserByUsername($username);
        $roles = $user->getRoles();

        return new PreAuthenticatedToken($user, $apiKey, $providerKey, $roles);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        return new Response(strtr($exception->getMessageKey(), $exception->getMessageData()), 401);
    }
}