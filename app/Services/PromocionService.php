<?php
namespace App\Services;
 
class PromocionService
{

    public static function addArrayPromocion($request)
    {
        $data = [
            "dni" =>  $request->dni,
            "celular" => $request->celular,
            "created_at"=>now(),
        ];

        return $data;
    }
}

?>