<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Constraint\IsTrue;

use function PHPUnit\Framework\isTrue;

class AuthController extends Controller
{
    

    public function register(Request $request)
    {
        $user = $request->validate([
            'email'=>'required|string|email|unique:users',
            'password'=>'required|min:8',
        ]);
       
        $user = User::create([
            'username' =>'username',
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            
        ]);


      

        $token = $user->createToken('authToken')->plainTextToken;

        return ApiResponse::sendResponse(200, $token, 'registered successfully', []);
    }


    public function login(Request $request)
    {   
       $request->validate([
            'email' => 'required',
            'password' => 'required'
       ]);
       
       $user = User::where('email', $request->email)->first();
       
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    $token = $user->createToken('authToken')->plainTextToken;
 
    return ApiResponse::sendResponse(200, $token, 'successfully login,welcome!', []);
      
      
      
      /* if (auth::attempt([
                'email'=>$request->email ,
                'password'=>$request->password])) {
                    

            

            $token = $user->createToken('authToken')->plainTextToken;
    
            return ApiResponse::sendResponse(200, $token, 'successfully login,welcome!', []);
        }
        

        return response()->json([
            'message' => 'error'
        ], 401);*/
    }

    public function logout(Request $request)
    {   
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
