@extends('menus.menuespecialista')

@section('contenido')
<title>Registrar coordenada</title>
<link href="/css/estilosVistaRegistrarCoordenada.css" rel="stylesheet"/>
<br>
<div>
    <h1>Registrar coordenada para el predio {{ $pred_id }}</h1>
    <div id="contenedorFormulario">
        <form id="formularioCoordenadas" method="post" action="/empleados/especialista/predios/agregarCoordenada">
            <div>
                <label>Altitud</label>
                <input class="txtField" type="text" name="coord_altitud">
            </div>
            @if($errors->has('coord_altitud'))
                <p class="alert alert-danger">{{$errors->first('coord_altitud')}}</p>
            @endif
            <div>
                <label>Latitud</label>
                <input class="txtField" type="text" name="coord_latitud">
            </div>
            @if($errors->has('coord_latitud'))
                <p class="alert alert-danger">{{$errors->first('coord_latitud')}}</p>
            @endif
            <input type="hidden" name="pred_id" value={{ $pred_id }}>
            <div class="d-flex justify-content-center">
                <input id="botonPeticion" type="submit" class="btn btn-primary" name="registrarCoordenada" value="Agregar coordenada">
            </div>
            {{ csrf_field() }}
        </form>
        <div id="contenedorTabla">
            <table class="table table-bordered mx-4">
                <thead>
                    <tr class="encabezado">
                        <td>Vértice</td>
                        <td>Altitud</td>
                        <td>Latitud</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coordenadas as $coordenada)
                    <tr>
                        <td>{{ $coordenada->getVertice() }}</td>
                        <td>{{ $coordenada->getAltitud() }}</td>
                        <td>{{ $coordenada->getLatitud() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @if (session('registrar')=='si')
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Predio registrado con éxito!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @endif
</div>
@endsection