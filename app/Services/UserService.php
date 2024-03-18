<?php
namespace App\Services;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public static function addArrayUserService($request)
    {
        $data = [
            "name" =>  $request->name,
            "email" => $request->email,
            "password"=>Hash::make($request->password),
        ];

        return $data;
    }
}

?>