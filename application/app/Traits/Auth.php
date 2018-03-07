<?php

namespace App\Traits;

use App\User;
use DateTime;
use Laravel\Passport\TokenRepository;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\ResourceServer;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;

/**
 * Trait IssueToken
 * @package App\Traits
 */
trait Auth{

    /**
     * @var ResourceServer
     */
    protected $server;

    /**
     * @var TokenRepository
     */
    protected $tokens;

    /**
     * Auth constructor.
     * @param ResourceServer $server
     * @param TokenRepository $tokens
     */
    public function __construct(ResourceServer $server, TokenRepository $tokens)
    {
        $this->server = $server;
        $this->tokens = $tokens;
    }

    /**
     * @param $request
     * @return bool
     */
    public function validateToken($request) {
        if(!isset($_COOKIE['token'])){
            return false;
        }
        $request->headers->set('Authorization',$_COOKIE['token']);
        $psr = (new DiactorosFactory)->createRequest($request);
        try {
            $psr = $this->server->validateAuthenticatedRequest($psr);
            $token = $this->tokens->find(
                $psr->getAttribute('oauth_access_token_id')
            );
            $currentDate = new DateTime();
            $tokenExpireDate = new DateTime($token->expires_at);
            return $tokenExpireDate > $currentDate && $token->user->hasRole('admin');
        } catch (OAuthServerException $e) {
            return false;
        }
    }

    /**
     * @param $request
     * @return \Laravel\Passport\Token
     */
    public function getToken($request)
    {
        if(!isset($_COOKIE['token'])){
            return null;
        }
        $request->headers->set('Authorization','Bearer '.$_COOKIE['token']);
        $psr = (new DiactorosFactory)->createRequest($request);
        try {
            $psr = $this->server->validateAuthenticatedRequest($psr);
            $token = $this->tokens->find(
                $psr->getAttribute('oauth_access_token_id')
            );
            return $token;
        } catch (OAuthServerException $e) {
            return null;
        }
    }

    /**
     * @param $request
     * @param $token
     * @return User
     */
    public function userByToken($request, $token)
    {
        $request->headers->set('Authorization','Bearer '.$token);
        $psr = (new DiactorosFactory)->createRequest($request);
        try {
            $psr = $this->server->validateAuthenticatedRequest($psr);
            $token = $this->tokens->find(
                $psr->getAttribute('oauth_access_token_id')
            );
            return $token->user;
        } catch (OAuthServerException $e) {
            return null;
        }
    }

    public function logoutUser($request){
        $token = $this->getToken($request);
        if($token){
            $token->revoke();
        }
        session()->flush();
        session()->regenerate();
        auth()->logout();
    }

}