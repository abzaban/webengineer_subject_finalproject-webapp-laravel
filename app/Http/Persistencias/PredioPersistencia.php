<?php

namespace App\Http\Persistencias;
use App\Models\Predio;
use Illuminate\Support\Facades\DB;

class PredioPersistencia
{
    public static function agregarCoordenada($coordenada) {
        $coordenada->save();
    }

    public static function generaClave() {
        $resultado = DB::select("exec PA_ObtenerClavePredio");
        return $resultado[0]->clave;
    }

    public static function guardarPredio($predio) {
        $predio->save();
    }
}
