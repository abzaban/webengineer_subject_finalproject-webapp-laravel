<?php

namespace App\Http\Persistencias;

use App\Models\Asignacion;
use App\Models\Palmera;
use App\Models\Predio;
use App\Models\VariedadDatil;
use App\Models\Actividad;

class AsignacionesPersistencia
{
    public static function agendarActividades($asignaciones) {
        foreach ($asignaciones as $asignacion) {
            $asignacion->save();
        }
    }

    public static function obtenerPalmerasPredio($pred_id) {
        $predio = Predio::find($pred_id);
        $palmeras = array();
        $palmeras = $predio->getPalmeras()->get();
        return $palmeras->filter(function($palmera) {
            return $palmera->getVariedadDatil()->get()[0]->getOrganica() == 1;
        });
    }

    public static function obtenerPalmerasNoOrganicas() {
        $palmeras = Palmera::all();
        return $palmeras->filter(function($palmera) {
            return $palmera->getVariedadDatil()->get()[0]->getOrganica() == 0;
        });
    }

    public static function getActividadesAgendadas($palm_id) {
        $asignaciones = Asignacion::where('palm_id', $palm_id)->where('asig_fechaRealizacion', '01-01-1999');
        return $asignaciones->get();
    }

    public static function getActividades($aptaOrganica) {
        if ($aptaOrganica) {
            return Actividad::where('act_aptaOrganica', $aptaOrganica)->get();
        }
        return Actividad::all();
    }

    public static function getActividadEspecifica($act_id) {
        return Actividad::find($act_id);
    }
}
