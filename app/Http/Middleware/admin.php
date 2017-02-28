<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $check = true;

        if (!Auth::check()) {
            $check =  false;
        }else{
            if (Auth::user()->role != 'admin')
            {
                $check =  false;
            }
        }
        if ($check ==  true){
            return $next($request);
        }else {
            return redirect('home');
        }
    }
}
