<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class HasAdminProp
{

    public function handle(Request $request, \Closure $next, $guard = null)
    {

        // Middleware
        // logged in user $request->user() else null
//        dd($request->has('sachin') ,  $request->get('sachin') === 'dsadas');
//        dd($request->all(), $request->merge([
//            'sweta' => 'dsadasd'
//        ])->all(), $request);

        if ($request->has('admin') && $request->get('admin') === 'uman') {
            //passed
            return $next($request);
        }

        abort(404);
    }

}
