<?php

namespace App\Http\Middleware;
use App\Models\User;
use Auth;
use Cache;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlinUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
         $expireAt = now()->addminutes(2);
         Cache::put('user-is-online'.Auth::id(),true,$expireAt);

         User::where('id',Auth::id())->update(['last_seen'=>now()]);

        }
        return $next($request);
    }
}
