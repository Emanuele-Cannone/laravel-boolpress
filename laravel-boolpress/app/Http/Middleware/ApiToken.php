<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ApiToken
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
        // recuperiamo il token
        $api_token = $request->header('authorization');

        if(empty($api_token)){
            return response()->json([
                'success' => false,
                'error' => 'non sei autenticato'
            ]);
        }

        // toglimo la parte Bearer prima con substr
        $api_token = substr($api_token, 7); 

        // controlliamo se l'utente con quel token è presente nel db

        $user = User::where('api_token', $api_token)->first();

        if(!$user){
            return response()->json([
            'success' => false,
            'error' => 'non sei autenticato'
            ]);
        }

        return $next($request);
    }
}
