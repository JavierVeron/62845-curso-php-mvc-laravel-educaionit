<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @else
            <div class="col-md-4 offset-md-2">
                <img src="{{$producto['imagen']}}" alt="Detalle del Producto" class="img-fluid">
            </div>
            <div class="col-md-4">
                <h1>{{$producto["nombre"]}}</h1>
                <p>{{$producto["descripcion"]}}</p>
                <p><b>${{$producto["precio"]}}</b></p>
                <p><i>Stock: ${{$producto["stock"]}}</i></p>
            </div>
            @endif
        </div>
    </div>  
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>