<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(SignupRequest $request){
        $data = $request->validated();
        $userType = $data['user_type'];
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_type' => $data['user_type']
        ]);
         /** @var User $user */
        $token = $user->createToken('main')->plainTextToken;
        return response(compact('user','token'));
    }
    public function login(LoginRequest $request){
        $credentials = $request->validated();
        if(!Auth::attempt($credentials)){
            return response([
                'message' => 'Provided credentials are not correct'
            ], 422);
        }
        /** @var User $user */
        $user = Auth::user();
       $token = $user->createToken('main')->plainTextToken;
        return response(compact('user','token'));

        $userType = strtolower($user->user_type);

        if ($userType === 'adm') {
            return $this->loginAdm($request);
        } else if ($userType === 'patient') {
            return $this->loginPatient($request);
        } else if ($userType === 'doctor') {
            return $this->loginDoctor($request);
        } else {
            return response([
                'message' => 'Bad Credentials!'
            ], 422);
        }
    }
    public function loginAdm(Request $request)
    {
        // Lógica de redirecionamento para usuário adm
        return redirect()->route('adm');
    }
    public function loginPatient(Request $request)
    {
        // Lógica de redirecionamento para usuário patient
        return redirect()->route('client');
    }

    public function loginDoctor(Request $request)
    {
        // Lógica de redirecionamento para usuário doctor
        return redirect()->route('doctors');
    }

    public function logout(Request $request){
        /** @var User $user */
        $user = $request->user();
        /* $user->currentAccessToken()->delete(); */
        if($user) {
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
    }
        return response('', 204);
    }
}
