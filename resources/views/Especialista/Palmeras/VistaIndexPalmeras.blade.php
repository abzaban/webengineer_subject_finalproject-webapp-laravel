@extends('menus.menuespecialista')

@section('contenido')
<title>Ver palmeras</title>
<link href="/css/estilosIndex.css" rel="stylesheet"/>
<br>
<div>
    <div class="cont__table">
        <table class="table table-bordered mx-4">
            <thead>
                <tr class="encabezado">
                    <td>ID</td>
                    <td>Altura</td>
                    <td>Ancho</td>
                    <td>Horas/luz/año</td>
                    <td>Aspecto de las hojas</td>
                    <td>Predio en el que se encuentra</td>
                    <td>Variedad que produce</td>
                    <td>Orgánica</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($palmeras as $palmera)
                <tr>
                    <td>{{ $palmera->getID() }}</td>
                    <td>{{ $palmera->getAltura() }} m</td>
                    <td>{{ $palmera->getAncho() }} cm</td>
                    <td>{{ $palmera->getHorasLuzAnio() }}</td>
                    <td>{{ $palmera->getAspectoHojas() }}</td>
                    <td>{{ $palmera->getPredio()->get()[0]->getID() }}</td>
                    <td>{{ $palmera->getVariedadDatil()->get()[0]->getNombre() }}</td>
                    <td>{{ $palmera->getVariedadDatil()->get()[0]->getOrganica() == 1 ? 'Si' : 'No' }}</td>
                    <td>
                        @if ($palmera->getVariedadDatil()->get()[0]->getOrganica() == 1)
                            <a class="btn btn-primary" href="/empleados/especialista/asignaciones/{{ $palmera->getID() }}">Asignar actividades</a>
                        @else
                            <p>Palmera no orgánica</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @empty($palmeras[0])
        <h3 class="d-flex justify-content-center my-3">No hay palmeras registradas aún</h3>
    @endempty
</div>
@endsection