<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;

class BeforeMiddleware
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
        //get url -> lang uithalen -> set
        $local = Session::get('locale');
        if(!$local){
            $local = 'nl';
        }
        App::setLocale($local);
        return $next($request);
    }
}
