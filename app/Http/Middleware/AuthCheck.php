<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session()->has('loginId') && (url('task')==$request->url() || url('taskedit')==$request->url()|| url('taskcreate')==$request->url()
        || url('taskstore')==$request->url()|| url('taskupdate')==$request->url())){
            return redirect(route('home'));  
        }
        return $next($request);
    }
}
