<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <link href="/css/estilosMenu.css" rel="stylesheet"/>
    </head>
    <body>
        <header>
            <nav>
                <div id="contenedorSubMenu">
                    <ul class="menu">
                        <li>
                            <a href="/">Inicio</a>
                        </li>
                        <li>
                            <a href="/login">Iniciar sesión</a>
                        </li>
                        <li>
                            <a href="/cerrarSesion">Cerrar sesión</a>
                        </li>
                        <li>
                            <a href="/ventas/verCarrito"><img src="/imagenes/carrito.png" width="30px"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div>
            <br>
            <br>
            @yield('contenido')
        </div>
    </body>
</html> 