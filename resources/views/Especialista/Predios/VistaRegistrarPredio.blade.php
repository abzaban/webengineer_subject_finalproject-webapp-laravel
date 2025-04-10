@extends('menus.menuespecialista')

@section('contenido')
<title>Registrar predio</title>
<link href="/css/estilosFormulario.css" rel="stylesheet"/>
<br>
<h1>Registrar Predio</h1>
<div id="contenedorFormulario">
    <form method="post" action="/empleados/especialista/predios/registrar">
        <label>Tamaño</label>
        <input class="txtField" type="text" name="pred_tamanio" value="{{ old('pred_tamanio') }}">
        @if($errors->has('pred_tamanio'))
            <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('pred_tamanio')}}</p>
        @endif
        <label>Temperatura promedio anual</label>
        <input class="txtField" type="text" name="pred_tempPromedioAnual" value="{{ old('pred_tempPromedioAnual') }}">
        @if($errors->has('pred_tempPromedioAnual'))
            <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('pred_tempPromedioAnual')}}</p>
        @endif
        <label>pH del suelo</label>
        <input class="txtField" type="text" name="pred_ph" value="{{ old('pred_ph') }}">
        @if($errors->has('pred_ph'))
            <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('pred_ph')}}</p>
        @endif
        <label>Localidad</label>
        <select class="form-select" name="locad_id">
            @foreach ($localidades as $localidad)
                <option value="{{ $localidad->getID() }}">
                    {{ $localidad->getNombre() }}
                </option>
            @endforeach
        </select>
        <input type="hidden" name="pred_organico" value={{ session('evaluar') == 'si' ? '1' : '0' }}>
        <div id="contenedorEvaluarPredio">
            <label class="mx-2">Tipo de predio</label>
            <input id="evaluarPredio" type="submit" class="btn {{ session('evaluar') == "si" ? 'btn-success' : 'btn-secondary' }}" name="evaluar" value="{{ session('evaluar') == "si" ? 'Predio orgánico' : 'Predio no orgánico' }}">
        </div>
        <div class="d-flex justify-content-center">
            <input id="registrarPredio" type="submit" class="btn btn-primary" name="registrar" value="Registrar">
        </div>
        {{ csrf_field() }}
    </form>
</div>
@endsection