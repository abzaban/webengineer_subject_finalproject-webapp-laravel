<?php

namespace App\Http\Controllers;

use App\Http\Fabricas\AsignacionesFabrica;
use App\Models\Predio;
use App\Models\Palmera;
use App\Http\Requests\asignacionesRequest;

class AsignacionesController extends Controller
{
    public function iniciarAsignacion($id) {
        $asignaciones = AsignacionesFabrica::getActividadesAgendadas($id);
        $actividades = AsignacionesFabrica::getActividades($id);
        return view('especialista.asignaciones.vistaasignaractividades', compact('asignaciones', 'actividades', 'id'));
    }

    public function mostrarPredios() {
        $predios = Predio::obtenerPrediosOrganicos();
        return view('especialista.predios.vistaindexpredios', compact('predios'));
    }

    public function mostrarPalmeras() {
        $palmeras = Palmera::obtenerPalmerasOrganicas();
        return view('especialista.palmeras.vistaindexpalmeras', compact('palmeras'));
    }

    public function agendarActividades(asignacionesRequest $request) {
        AsignacionesFabrica::agendarActividades($request->all());
        if (str_contains($request->pred_pal_id, 'AL')) {
            return redirect('/empleados/especialista/palmeras/verPalmeras');
        }
        return redirect('/empleados/especialista/predios/verPredios');
    }
}
