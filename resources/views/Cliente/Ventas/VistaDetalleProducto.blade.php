@extends('menus.menucliente')

@section('contenido')
<title>Detalle del producto</title>
<link href="/css/estilosVistaDetalleProducto.css" rel="stylesheet"/>
<br>
<div>
    <form method="post" class="d-flex flex-column align-items-center" action="/ventas/añadirArticuloCarrito">
        <div class="d-flex">
            <img src="{{ $variedad->getRutaImagen() }}" width="400" class="img-fluid img-thumbnail mx-5">
            <div>
                <div class="contenedoresDatosProducto">
                    <label>Nombre: </label>
                    <p>{{ $variedad->getNombre() }}</p>
                </div>
                <div class="contenedoresDatosProducto">
                    <label>Precio: </label>
                    <p>${{ $variedad->getPrecio() }}</p>
                </div>
                <div class="contenedoresDatosProducto">
                    <label>Orgánica: </label>
                    <p>{{ $variedad->getOrganica() == 0 ? 'No' : 'Si' }}</p>
                </div>
                <input type="hidden" name="varied_id" value="{{ $variedad->getID() }}">
                <div class="contenedoresDatosProducto">
                    <label>Cantidad: </label>
                    @if ($variedad->getDisponibilidad() == 0)
                        <p>Producto agotado</p>
                    @else
                        <input type="number" name="car_cantidad" value="1" min="1" max="{{ $variedad->getDisponibilidad() }}">
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary mt-2" name="añadirCarrito" value="Añadir al carrito" {{ $variedad->getDisponibilidad() == 0 ? 'disabled' : '' }}>
                </div>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
</div>
@endsection