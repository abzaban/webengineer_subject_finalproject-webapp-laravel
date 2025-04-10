@extends('menus.menuespecialista')

@section('contenido')
<title>Ver predios</title>
<link href="/css/estilosIndex.css" rel="stylesheet"/>
<br>
<div>
    <div class="d-flex justify-content-center my-2">
        <a href="/empleados/especialista/asignaciones/{{ 'prediosNoOrganicos' }}" class="btn btn-primary">Asignar a predios no orgánicos</a>
    </div>
    <div class="cont__table">
        <table class="table table-bordered mx-4">
            <thead>
                <tr class="encabezado">
                    <td>ID</td>
                    <td>Orgánico</td>
                    <td>Tamaño</td>
                    <td>Temperatura promedio anual</td>
                    <td>pH del suelo</td>
                    <td>localidad</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($predios as $predio)
                <tr>
                    <td>{{ $predio->getID() }}</td>
                    <td>{{ $predio->getOrganico() == '0' ? "No" : "Si" }}</td>
                    <td>{{ $predio->getTamanio() }}</td>
                    <td>{{ $predio->getTemperaturaPromedioAnual() }}</td>
                    <td>{{ $predio->getPh() }}</td>
                    <td>{{ $predio->getLocalidad()->get()[0]->getNombre() }}</td>
                    <td>
                        @if (!empty($predio->getPalmeras()->get()[0]))
                            <a class="btn btn-primary" href="/empleados/especialista/asignaciones/{{ $predio->getID() }}">Asignar actividades</a>
                        @else
                            <p>Predio vacío</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @empty($predios[0])
        <h3 class="d-flex justify-content-center my-3">No hay predios registrados aún</h3>
    @endempty
</div>
@endsection