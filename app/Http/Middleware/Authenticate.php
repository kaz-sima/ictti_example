<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected $guards = [];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string[] ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // keeping guard name
        $this->guards = $guards;
        return parent::handle($request, $next, ...$guards);
    }
        /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        // redirect as per guard name
        if(in_array('admin', $this->guards, true)) {
            return route('admin.login');
        }
        elseif (in_array('user', $this->guards, true)) {
            return route('login');
        }
        else { 
            return '/';
        }
    }
}

