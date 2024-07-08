<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    
public function register(Request $request){
    $fields = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ]);

    // Hash the password before saving it
    $fields['password'] = Hash::make($fields['password']);

    $user = User::create($fields);

    $token = $user->createToken($request->name);

    return [
        'user' => $user,
        'token' => $token->plainTextToken
    ];
}

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, 
        $user->password)) {
            
            return [
                'Message' => 'Kata Sandi Yang Anda Masukkan Salah'
            ];
        }

        $token = $user -> createToken($user->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];

    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return [
            'Message' => 'Anda Berhasil Logout'
        ];
    }

    public function rePassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'passwordLama' => 'required',
            'passwordBaru' => 'required|confirmed|min:6'
        ]);

        $user = $request->user();

        if ($request->email !== $user->email) {
            return response()->json([
                'message' => 'Email tidak sesuai'
            ], 400);
        }

        if (!Hash::check($request->passwordLama, $user->password)) {
            return response()->json([
                'message' => 'Password lama tidak sesuai'
            ], 400); 
        }

        $user->password = Hash::make($request->passwordBaru);
        $user->save();

        return response()->json([
            'message' => 'Password berhasil diperbarui'
        ], 200); 
    }
    
}