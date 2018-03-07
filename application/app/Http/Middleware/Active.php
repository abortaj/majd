<?php

namespace App\Http\Middleware;

use App\Traits\Auth;
use Closure;

class Active
{
    use Auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(auth()->user()->active) {
            return $next($request);
        }
        $this->logoutUser($request);
        if($request->ajax()){
            return response()->json(['redirect'=>route('login')]);
        }
        return redirect(route('login'));
    }
}
