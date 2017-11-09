<?php

namespace App\Http\Middleware;
use Auth;
use Session;
use App\User;
use Closure;

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

      if (!Auth::user()->admin) {
         
       Session::flash('info', 'You do not permit that make it ');


      return redirect()->back();
      }

        return $next($request);
    }
}
