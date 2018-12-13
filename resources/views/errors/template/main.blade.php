<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            .links a{
                font-size: 22px;
                margin-bottom: 40px;
                color: #A8A4A4;
            }
            .links a:hover{
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                @yield('content')
                <div class="links">
                    <a href="javascript:history.back(1)">Volver atrás</a>
                    <a href="{{ route('admin.index') }}">Volver al Inicio</a>
                </div>
            </div>
        </div>
    </body>
</html>