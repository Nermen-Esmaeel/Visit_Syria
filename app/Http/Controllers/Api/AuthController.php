<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isTrue;
use App\Providers\RouteServiceProvider;

use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Framework\Constraint\IsTrue;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    

   
    public function redirectToGoogle()  {

        return Socialite::with('google')->stateless()->redirect();
        
    }

   public function handleGoogleCallback()
    {   
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if(!$user)
        {
            $user = User::create(['name' => $googleUser->name, 
            'email' => $googleUser->email,
            'photo' => $googleUser->avatar,
            'password' =>Hash::make(rand(100000,999999))
        ]);
    }
    
        $token = $user->createToken('token-name')->plainTextToken;

        return ApiResponse::sendResponse(200, $token, 'successfully login,welcome!', []);
    }


    public function logout(Request $request)
    {   
        $request->user()->tokens()->delete();
        return ApiResponse::sendResponse(200,null, 'Successfully logged out', []);

        
    }
}

