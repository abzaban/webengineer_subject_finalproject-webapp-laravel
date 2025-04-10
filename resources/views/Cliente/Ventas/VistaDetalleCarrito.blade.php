@extends('menus.menucliente')

@section('contenido')
<title>Ver carrito de compras</title>
<link href="/css/estilosVistaVerCarrito.css" rel="stylesheet"/>
<br>
<div id="contenedorPrincipal">
    <h1>Carrito de compras</h1>
    <div id="contenedorPago">
        
        @if ($totalPedido == 0)
            <label id="labelTotal">Carrito vacío</label>
        @else
            <label id="labelTotal">Total: ${{ $totalPedido }}</label>
            <a href="/ventas/pagarCarrito" class="btn btn-primary" value="Pagar">Pagar</a>

        @endif
    </div>
    <div id="contenedorArticulos">
        @foreach ($carrito as $articulo)
        <div id="contenedorDatosArticulos">
            <div>
                <img src="{{ $articulo->getVariedadDatil()->get()[0]->getRutaImagen() }}" width="200px" class="img-fluid img-thumbnail mx-5">
            </div>
            <div id="contenedorEtiquetas">
                <div>
                    <label>Producto: </label>
                    <label>{{ $articulo->getVariedadDatil()->get()[0]->getNombre() }}</label>
                </div>
                <div>
                    <label>Cantidad: </label>
                    <label>{{ $articulo->getCantidad() }}</label>
                </div>
                <div>
                    <label>Precio unitario: </label>
                    <label>${{ $articulo->getVariedadDatil()->get()[0]->getPrecio() }}/kg</label>
                </div>
                <div>
                    <label>Subtotal: </label>
                    <label>${{ $articulo->getVariedadDatil()->get()[0]->getPrecio() * $articulo->getCantidad() }}</label>
                </div>
                <div class="mt-2">
                    <form method="post" action="/ventas/eliminarArticulo/{{ $articulo->getVariedadID() }}" class="show_confirm">
                        <input type="submit" class="btn btn-xs btn-danger btn-flat " value="Quitar del carrito">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    <script>
        $('.show_confirm').submit(function(e) {

            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro de quitar este artículo?',
                text: "¡El artículo se quitara del carrito de compras!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Remover'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });
    </script>
</div>
@endsection