<?php

namespace App\Http\Fabricas;

use App\Http\Persistencias\AsignacionesPersistencia;
use App\Models\Predio;
use App\Models\Palmera;
use App\Models\Actividad;
use App\Models\Asignacion;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;

class AsignacionesFabrica
{
    public static function getActividadesAgendadas($id) {
        $palmeras = self::recuperarPalmeras($id);
        return AsignacionesPersistencia::getActividadesAgendadas($palmeras[array_key_first($palmeras->toArray())]->getID());
    }

    public static function recuperarPalmeras($id) {
        if (str_contains($id, 'AL')) {
            $palmeras[0] = Palmera::find($id);
            return collect($palmeras);
        } else if (str_contains($id, 'prediosNoOrganicos')) {
            return AsignacionesPersistencia::obtenerPalmerasNoOrganicas();
        } else {
            return AsignacionesPersistencia::obtenerPalmerasPredio($id);
        }
    }

    public static function agendarActividades($datosAsignacion) {
        $palmeras = self::recuperarPalmeras($datosAsignacion['pred_pal_id']);
        $actividadesElegidas = array();
        $diasElegidos = array();
        $diasDeLaSemana["lunes"] = 1;
        $diasDeLaSemana["martes"] = 2;
        $diasDeLaSemana["miercoles"] = 3;
        $diasDeLaSemana["jueves"] = 4;
        $diasDeLaSemana["viernes"] = 5;
        foreach ($datosAsignacion as $clave => $dato) {
            if (is_numeric($clave)) {
                array_push($actividadesElegidas, AsignacionesPersistencia::getActividadEspecifica($clave));
            }
            if (array_key_exists($clave, $diasDeLaSemana)) {
                array_push($diasElegidos, $diasDeLaSemana[$clave]);
            }
        }
        if (empty($actividadesElegidas)) {
            return "No hay actividades elegidas";
        }
        if (empty($diasElegidos)) {
            return "No hay días elegidos";
        }
        $fechaFinModificada = new DateTime($datosAsignacion["fechaFin"]);
        $fechaFinModificada = $fechaFinModificada->modify('+1 day');
        $intervalo = DateInterval::createFromDateString('1 day');
        $periodo = new DatePeriod(new DateTime($datosAsignacion["fechaInicio"]), $intervalo, $fechaFinModificada);
        $asignaciones = array();
        foreach ($periodo  as $dia) {
            if (in_array($dia->format("w"), $diasElegidos)) {
                foreach ($actividadesElegidas as $actividad) {
                    foreach ($palmeras as $palmera) {
                        $asignacion["palm_id"] = $palmera->getID();
                        $asignacion["act_id"] = $actividad->getID();
                        $asignacion["asig_fechaProgramada"] = $dia;
                        $asignacion["asig_fechaRealizacion"] = '1999-01-01';
                        $asignacion["usu_id"] = Auth::user()->id;
                        $asignacion["asig_costo"] = $actividad->getCosto();
                        $asignaciones[] = new Asignacion($asignacion);
                    }
                }
            }
        }
        AsignacionesPersistencia::agendarActividades($asignaciones);
    }

    public static function getActividades($id) {
        $palmeras = self::recuperarPalmeras($id);
        return AsignacionesPersistencia::getActividades($palmeras[array_key_first($palmeras->toArray())]->getVariedadDatil()->get()[0]->getOrganica());
    }
}
