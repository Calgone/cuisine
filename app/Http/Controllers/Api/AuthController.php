<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/**
 * Undocumented class
 * 
 * @author Grégory Lecubin <gregory.lecubin@gmail.com>
 */
class AuthController extends Controller
{
    /**
     * Register a user
     *
     * @param Request $request La requete
     * 
     * @return void
     */
    public function register(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->toArray());

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];

        return response($response, 200);
    }

    /**
     * Login a user
     *
     * @param Request $request La requete
     * 
     * @return void
     */
    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(
                [
                    'message' => 'Wrong email or password',
                    'status' => 422
                ],
                422
            );
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    'message' => 'Wrong email or password',
                    'status' => 422
                ],
                422
            );
        }

        // $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        // $response = ['token' => $token];
        // return response($response, 200);

        // Send an internal API request to get an access token
        $client = DB::table('oauth_clients')
            ->where('password_client', true)
            ->first();

        // Make sure a Password Client exists in the DB
        if (!$client) {
            return response()->json(
                [
                    'message' => 'Laravel Passport is not setup properly.',
                    'status' => 500
                ],
                500
            );
        }

        $data = [
            'grant_type' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'username' => request('email'),
            'password' => request('password'),
        ];

        $request = Request::create('/oauth/token', 'POST', $data);

        $response = app()->handle($request);

        // Check if the request was successful
        if ($response->getStatusCode() != 200) {
            return response()->json(
                [
                    'message' => 'Wrong email or password',
                    'status' => 422
                ],
                422
            );
        }

        // Get the data from the response
        $data = json_decode($response->getContent());

        // Format the final response in a desirable format
        return response()->json(
            [
                'token' => $data->access_token,
                'user' => $user,
                'status' => 200
            ]
        );
    }

    /**
     * Logout a user
     *
     * 
     * 
     */
    public function logout()
    {
        $accessToken = auth()->user()->token();

        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(
                ['revoked' => true]
            );

        $accessToken->revoke();

        return response()->json(['status' => 200]);
    }

    /**
     * Get a user
     * 
     * @return mixed User
     */
    public function getUser()
    {
        return auth()->user();
    }
}
