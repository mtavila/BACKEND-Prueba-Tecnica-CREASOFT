<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Services\{
	UserService,
};
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //
    public function register(UserStoreRequest $request)
    {
        try {
            $data = UserService::addArrayUserService($request);
            User::create($data);
            $response = response()->json(['status' => 'success'], 200);
            return $response;
        } catch (Exception $exception) {
            return $this->badRequest(message: $exception);
        }
    }

    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!empty($user))
        {
            if(Hash::check($request->password, $user->password))
            {
                $token = $user->createToken("Token")->plainTextToken;
                
                return response()->json(["status" => true, "message" => "Login Correcto", "token" => $token]);
            }

            return response()->json(["status" => false, "message" => "Contraseña Incorrecta"]);
        }
        return response()->json(["status" => false, "message" => "El Usuario no existe"]);
    }

    public function profile()
    {
        $data = auth()->user();
        return response()->json(["status" => true, "message" => "Datos Perfil", "user" => $data]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(["status" => true, "message" => "Sesión Cerrada"]);
    }

}
