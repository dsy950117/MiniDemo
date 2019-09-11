<?php

namespace App\Http\Middleware;

use Closure;

class IdMustBePostiveInt
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
//        dd($id);
        $v = $request->route('id');
        if(! (is_numeric($v) && is_int($v + 0) && ($v + 0) > 0)) {
            return redirect('/404');
        }

        return $next($request);


    }
}
