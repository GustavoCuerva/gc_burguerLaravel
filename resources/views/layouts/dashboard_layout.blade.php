<!DOCTYPE html>
<html lang="pt  ">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{asset('/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/painel.css')}}" />
    <title>Hamburgueria GC - @yield('title')</title>
  </head>
  <body>
    @yield('content')
    <script src="{{asset('/js/script.js')}}"></script>
</body>
</html>