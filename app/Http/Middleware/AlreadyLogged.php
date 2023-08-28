<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlreadyLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has('loginId') && (url('login')==$request->url() || url('registration')==$request->url()|| url('log.post')==$request->url()
        || url('reg.post')==$request->url())){
               return redirect(route('home'));  
        }
   

        return $next($request);
    }
}
