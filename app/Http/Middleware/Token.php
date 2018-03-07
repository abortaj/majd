<?php

namespace App\Http\Middleware;

use Closure;
use Laravel\Passport\TokenRepository;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\ResourceServer;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;
use DateTime;

class Token{


    protected $server;
    protected $tokens;

    public function __construct(ResourceServer $server, TokenRepository $tokens) {
        $this->server = $server;
        $this->tokens = $tokens;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($this->validateToken($request)) {
            return $next($request);
        }
        return redirect('/home');
    }

    public function validateToken($request) {
        $request->headers->set('Authorization',$_COOKIE['token']);
        $psr = (new DiactorosFactory)->createRequest($request);
        try {
            $psr = $this->server->validateAuthenticatedRequest($psr);
            $token = $this->tokens->find(
                $psr->getAttribute('oauth_access_token_id')
            );
            $currentDate = new DateTime();
            $tokenExpireDate = new DateTime($token->expires_at);
            if($tokenExpireDate > $currentDate){
                if(!auth()->check()){
                    auth()->login($token->user, true);
                }
                return true;
            }
            auth()->logout();
            return false;
        } catch (OAuthServerException $e) {

            dd( json_encode(array('error' => 'Something went wrong with authenticating. Please logout and login again.'))) ;
        }
    }

}
