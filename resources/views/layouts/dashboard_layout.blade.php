<!DOCTYPE html>
<html lang="pt  ">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{asset('/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('/css/painel.css')}}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Hamburgueria GC - @yield('title')</title>
  </head>
  <body>
    @yield('content')
    <script src="{{asset('/js/script.js')}}"></script>
    <script src="{{asset('/js/jquery-3.6.1.js')}}"></script>
    <script src="{{asset('/js/jquery.mask.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
      $('#valor').mask('9999999999990,00', {reverse:true});
    </script>
</body>
</html>