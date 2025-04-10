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
                <ul class="menu">
                    <li>
                        <a href="/empleados/especialista/inicio">Inicio</a>
                    </li>
                    <li>
                        <a href=>Predios</a>
                        <ul class="submenu">
                            <li><a href="/empleados/especialista/predios/registrarPredio">Registrar</a></li>
                            <li><a href="/empleados/especialista/predios/verPredios">Ver</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href=>Palmeras</a>
                        <ul class="submenu">
                            <li><a href="/empleados/especialista/palmeras/verPalmeras">Ver</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/cerrarSesion">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div>
            <br>
            <br>
            @yield('contenido')
        </div>
    </body>
</html> 