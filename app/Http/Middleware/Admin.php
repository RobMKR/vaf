<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;

class Admin
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
        if ($this->isLoggedIn()) {
            return $next($request);
        }
        return redirect('/admin/login');
    }
    
    public static function isLoggedIn(){
        if(Session::has('user_id') && Session::get('user_id') ===  md5('vafadmin')){
            return true;
        }
        return false;
    }
}
