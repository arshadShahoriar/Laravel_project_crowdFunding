<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class typeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $type =   $request->session()->get('type');
        if ($type==3){
        return $next($request);
    }
    else
        return redirect('login');
    }
}
