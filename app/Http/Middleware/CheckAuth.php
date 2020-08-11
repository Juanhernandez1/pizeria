<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class CheckAuth
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

        if (Cookie::get('Auth') != null) {
            $cooki = Cookie::get('Auth');

            $value = json_decode($cooki);

            if ($value->auth) {
                return $next($request);
            }
            $arr = array('Mensaje' => 'Inicie Secion o Registrese para Realizar su pedido');

            return response(json_encode($arr), 401);

        }

        $arr = array('Mensaje' => 'Inicie Secion o Registrese para Realizar su pedido');

        return response(json_encode($arr), 401);

    }
}
