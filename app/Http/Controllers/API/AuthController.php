<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserSignUpRequest;
use App\User;
use function Couchbase\passthruDecoder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $user = User::whereEmail(request('username'))->first();
        if (!$user) {
            $user=User::where('username', $request->get('username'))->get()->first();

            if (!$user) {
                return response()->json([
                    'message' => 'Wrong username or email or password',
                    'status' => 422
                ], 422);
            }

        }

        if (!Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422
            ], 422);
        }


        $client = DB::table('oauth_clients')
            ->where('password_client', true)
            ->first();

        if (!$client) {
            return response()->json([
                'message' => 'Laravel Passport is not setup properly.',
                'status' => 500
            ], 500);
        }

        $data = [
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => $user->email,
            'password' => $request->get('password'),
        ];

        $request = Request::create('/oauth/token', 'POST', $data);

        $response = app()->handle($request);


        if ($response->getStatusCode() != 200) {
            return response()->json([
                'message' => 'Response Wrong email or password',
                'status' => 422
            ], 422);
        }

        $data = json_decode($response->getContent());

        return response()->json([
            'token' => $data->access_token,
            'user' => $user,
            'status' => 200
        ]);
    }

    public function signUp(UserSignUpRequest $request)
    {
        User::create($request->all());

        return response()->json([
            'status' => 201
        ],201);
    }

}
