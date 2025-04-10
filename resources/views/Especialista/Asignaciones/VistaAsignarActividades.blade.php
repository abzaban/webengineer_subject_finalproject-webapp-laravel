@extends('menus.menuespecialista')

@section('contenido')
<title>Asignar actividades</title>
<link href="/css/estilosIndex.css" rel="stylesheet"/>
<br>
<div>
    <div class="cont__table">
        <table class="table mx-4">
            <thead>
                <tr class="encabezado">
                    <td>Actividad</td>
                    <td>Fecha programada</td>
                    <td>Costo</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaciones as $asignacion)
                <tr>
                    <td>{{ $asignacion->getActividad()->get()[0]->getNombre() }}</td>
                    <td>{{ $asignacion->getFechaProgramada() }}</td>
                    <td>{{ $asignacion->getCosto() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @empty($asignaciones[0])
        <h3 class="d-flex justify-content-center my-3">No hay actividades agendadas aún</h3>
    @endempty
    <br>
    
    <div id="contenedorFormActividades">
        <form id="contenedorActividades" method="post" action="/empleados/especialista/asignaciones/asignar" class="show_confirm">
            <input type="hidden" class="my-2" name="pred_pal_id" id="pred_pal_id" value="{{ $id }}">
            <h4>Actividades</h4>
            @foreach ($actividades as $actividad)
            <div class="contenedoresDelForm">
                <input class="form-check-input" type="checkbox" id="{{ $actividad->getID() }}" name="{{ $actividad->getID() }}">
                <label class="form-check-label" for="{{ $actividad->getID() }}">{{ $actividad->getNombre() }}</label>
            </div>
            @endforeach
            @empty($actividades[0])
                <h3 class="d-flex justify-content-center my-3">No hay actividades registradas aún</h3>
            @endempty
            <br>
            <div class="contenedoresDelForm">
                <label>Fecha de inicio</label>
                <input class="txtField" type="date" name="fechaInicio">
            </div>
            @if($errors->has('fechaInicio'))
                <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('fechaInicio')}}</p>
            @endif
            <div class="contenedoresDelForm">
                <label>Fecha de fin</label>
                <input class="txtField" type="date" name="fechaFin">
            </div>
            @if($errors->has('fechaFin'))
                <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('fechaFin')}}</p>
            @endif
            <br>
            <h4>Días a la semana que se realizarán las actividades</h4>
            <div class="contenedoresDelForm">
                <input class="form-check-input" type="checkbox" id="lunes" name="lunes">
                <label class="form-check-label" for="lunes">Lunes</label>
            </div>
            <div class="contenedoresDelForm">
                <input class="form-check-input" type="checkbox" id="martes" name="martes">
                <label class="form-check-label" for="martes">Martes</label>
            </div>
            <div class="contenedoresDelForm">
                <input class="form-check-input" type="checkbox" id="miercoles" name="miercoles">
                <label class="form-check-label" for="miercoles">Miércoles</label>
            </div>
            <div class="contenedoresDelForm">
                <input class="form-check-input" type="checkbox" id="jueves" name="jueves">
                <label class="form-check-label" for="jueves">Jueves</label>
            </div>
            <div class="contenedoresDelForm">
                <input class="form-check-input" type="checkbox" id="viernes" name="viernes">
                <label class="form-check-label" for="viernes">Viernes</label>
            </div>
            @if(empty($actividades[0]))
                <input type="submit" class="btn btn-primary mt-3" value="Asignar" disabled>
            @else
                <input type="submit" class="btn btn-primary mt-3" value="Asignar">
            @endif
            {{ csrf_field() }}
        </form>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
        <script>
            $('.show_confirm').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Está seguro de realizar la asignación?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Asignar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        </script>
    </div>
</div>
@endsection