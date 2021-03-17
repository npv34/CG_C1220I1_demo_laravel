<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        //  code logic
        $birthday = $request->birthday;
        $yearOld =  Carbon::parse($birthday)->age;
        if ($yearOld < 18) {
            return back();
        }

        return $next($request);
    }
}
