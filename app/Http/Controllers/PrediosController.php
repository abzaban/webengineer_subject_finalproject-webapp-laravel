<?php

namespace App\Http\Controllers;

use App\Models\Predio;
use App\Models\Localidad;
use App\Http\Requests\coordenadasRequest;
use App\Http\Requests\prediosRequest;
use App\Http\ServiciosExternos\ServicioValidacion;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class PrediosController extends Controller
{
    public function iniciarRegistro()
    {
        $localidades = Localidad::obtenerLocalidades();
        return view('especialista.predios.vistaregistrarpredio', compact('localidades'));
    }

    public function guardarPredio(prediosRequest $request) {
        if (isset($_POST['registrar'])) {
            $pred_id = Predio::crearPredio($request->all());
            $coordenadas = collect();
            return view('especialista.predios.vistaregistrarcoordenada', compact('coordenadas', 'pred_id'))->with('registrar', 'ok');
        }
        if (ServicioValidacion::evaluarPredio($request->pred_tempPromedioAnual, $request->pred_ph)) {
            return back()->withInput()->with('evaluar', 'si');
        }
        else {
            return back()->withInput()->with('evaluar', 'no');
        }
    }

    public function agregarCoordenada(coordenadasRequest $request) {
        $request->validate([
            'coord_latitud' => 'required',
            'coord_altitud' => 'required',
        ]);
        $pred_id = $request->pred_id;
        $predio = Predio::getPredio($pred_id);
        $predio->agregarCoordenada($request->coord_altitud, $request->coord_latitud);
        $coordenadas = $predio->getCoordenadas()->get();
        return view('especialista.predios.vistaregistrarcoordenada', compact('coordenadas', 'pred_id'));
    }
}
