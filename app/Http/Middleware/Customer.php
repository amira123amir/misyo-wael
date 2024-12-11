<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Traits\GeneralTrait;
class Customer
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
                       

        if(auth()->guard('sanctum')->user()->role=='customer'){
        return $next($request);
    }else{

        return $this->unAuthorizeResponse();
    }
}
}
