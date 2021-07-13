<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> Super gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href= {{ asset('./css/estilo_basico.css')}}>

    </head>

    <body>
       @include('site.layouts.reaproveitados.menu')
       @yield('conteudo')

    </body>
</html>
