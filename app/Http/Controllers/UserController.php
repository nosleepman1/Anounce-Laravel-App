<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function register(UserRegisterRequest $register) {
        try {
            $data = $register->validated();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            return response()->json([
                'message' => 'inscription reussie',
                'data' => $data
            ],201);

        } catch (Exception $e) {
            return response()->json($e,409);
        }
    }

    public function login(UserLoginRequest $register) {
         try {
            $data = $register->validated();

            $user = User::where('email', '=', $data['email'] )->first();

            if(!$user || Hash::check($data['password'], $user->password)){
                return response()->json([
                'message' => 'Mail ou mdp incorrect',
            ],400);
            }

            return response()->json([
                'message' => 'inscription reussie',
                'data' => $user
            ],201);

        } catch (Exception $e) {
            return response()->json($e,409);
        }
    }

    public function me(User $user){
            return response()->json([
                'me'=> $user->get()
            ],200);

    }


    public function logout(Post $post){
    }


}
