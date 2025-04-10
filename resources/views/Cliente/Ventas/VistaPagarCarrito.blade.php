@extends('menus.menucliente')

@section('contenido')
<title>Pagar carrito</title>
<link href="/css/estilosVistaPagarCarrito.css" rel="stylesheet"/>
<br>
<div>
    <div id="contenedorFormulario">
        <form method="post" action="/ventas/carrito/pagar" class="show_confirm">
            <h1>Pagar carrito</h1>

            <div class="justify-content-center">
                <label>No. tarjeta de crédito</label>
                <input class="textField" type="text" name="noTarjetaCredito">
            </div>
            @if($errors->has('noTarjetaCredito'))
                <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('noTarjetaCredito')}}</p>
            @endif
            <div class="justify-content-center">
                <label>NIP</label>
                <input type="number" name="nip" min:000>
            </div>
            @if($errors->has('nip'))
                <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('nip')}}</p>
            @endif
            <label>Fecha de expiración</label>
            <div class="justify-content-center">
                <label>Mes</label>
                <input class="textField" type="text" name="mes">
            </div>
            @if($errors->has('mes'))
                <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('mes')}}</p>
            @endif
            <div class="justify-content-center">
                <label>Año</label>
                <input class="textField" type="text" name="anio">
            </div>
            @if($errors->has('anio'))
                <p class="alert alert-danger d-flex justify-content-center">{{$errors->first('anio')}}</p>
            @endif
            <input type="submit" value="Pagar" class="btn btn-primary">
            {{ csrf_field() }}
        </form>
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
    <script>
        $('.show_confirm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro de realizar el pago?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Pagar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
</div>   
@endsection