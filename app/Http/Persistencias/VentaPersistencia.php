<?php

namespace App\Http\Persistencias;

use App\Models\VariedadDatil;
use App\Models\ArticuloCarrito;
use Illuminate\Support\Facades\DB;

class VentaPersistencia
{

    public static function guardarArticuloCarrito($articulo) {
        $articuloViejo = ArticuloCarrito::where('usu_id', $articulo->usu_id)->where('varied_id', $articulo->varied_id)->first();
        if ($articuloViejo != null) {
            $nuevaCantidad = $articuloViejo->getCantidad() + $articulo->getCantidad();
            DB::table('articulos_carrito')->where('usu_id', $articulo->getUsuarioID())->where('varied_id', $articulo->getVariedadID())->update(['car_cantidad' => $nuevaCantidad]);
            return;
        }
        $articulo->save();
    }

    public static function recuperarCarrito($usu_id) {
        return ArticuloCarrito::where('usu_id', $usu_id)->get();
    }

    public function quitarArticuloCarrito($varied_id, $usu_id) {
        $articulo = ArticuloCarrito::where('varied_id', $varied_id)->where('usu_id', $usu_id);
        $articulo->delete();
    }

    public function generaFolio() {
        $resultado = DB::select("exec PA_ObtenerFolio");
        return $resultado[0]->clave;
    }

    public function guardarVenta($lineasDeVenta, $venta) {
        $venta->save();
        foreach ($lineasDeVenta as $linea) {
            $linea->save();
        }
    }
}
