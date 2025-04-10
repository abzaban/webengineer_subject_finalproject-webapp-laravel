@extends('menus.menucliente')

@section('contenido')
<title>Menú principal</title>
<link href="/css/estilosVistaPrincipalCliente.css" rel="stylesheet"/>
<br>
<div>
    <h1>Catálogo de productos</h1>
    @foreach ($variedades as $variedad)
    <div id="contenedorProductos">
        <a href="/productos/{{ $variedad->getID() }}"><img src="{{ $variedad->getRutaImagen() }}" width="200" class="img-fluid img-thumbnail"></a>
        <div>
            <h4>{{ $variedad->getNombre() }}</h4>
            <h5>${{ $variedad->getPrecio() }}</h5>
        </div>
    </div>
    @endforeach
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @if (session('ventaRealizada')=='si')
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Venta realizada con éxito!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @endif
</div>
@endsection