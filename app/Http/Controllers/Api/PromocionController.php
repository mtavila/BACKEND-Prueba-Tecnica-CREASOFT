<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;
use Validator;
use App\Http\Requests\PromocionStoreRequest;
use App\Services\{
	PromocionService,
};

class PromocionController extends Controller
{
    //
    public function listadoPromociones() {
        $promociones = Promo::all();
        return response()->json($promociones);
    }

    // Método Guardar Datos
    public function store(PromocionStoreRequest $request)
    {
        try {
            $data = PromocionService::addArrayPromocion($request);
            Promo::create($data);
            $response = response()->json(['status' => 'success'], 200);
            return $response;
        } catch (Exception $exception) {
            return $this->badRequest(message: $exception);
        }
    }

}
