<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        if ($request->isMethod('get')) {
            return response()->json([
                'error' => [
                    'message'     => 'Method Not Allowed',
                    'status_code' => 405,
                ],
            ]);
        }

        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $request = $request->only('email', 'password');

        if (auth()->attempt($request)) {

            return response()->json(auth()->user()->api_token);

        } else {

            return response()->json([
                'error' => [
                    'message'     => 'Invalid username or password.',
                    'status_code' => 401,
                ],
            ], 401);

        }
    }

    public function reset(Request $request)
    {
        $user            = $request->user();
        $user->api_token = str_random(60);
        $user->save();

        return response()->json($user->api_token);
    }

}
