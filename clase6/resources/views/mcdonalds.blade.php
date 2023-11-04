<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row my-5">
            <div class="col text-center">
                <a href="/mcdonalds"><img src="images/mcdonalds-logo-footer-bg-white.png" alt="Mc Donalds" width="80" /></a>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalMcDonalds">Agregar (+)</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="text-start align-middle"><img src="{{$producto->imagen}}" alt="#" width="64" /></td>
                            <td class="text-start align-middle">{{$producto->nombre}}</td>
                            <td class="text-start align-middle">${{$producto->precio}}</td>
                            <td class="text-end align-middle"><a href="#" class="btn btn-danger" onclick="eliminarProducto('{{$producto->id}}')">Eliminar (-)</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <div id="resultadoEliminacion"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalMcDonalds" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agragá tu Producto!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="col-form-label">Precio:</label>
                            <input type="text" class="form-control" id="precio" name="precio">
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="col-form-label">Imagen:</label>
                            <input type="text" class="form-control" id="imagen" name="imagen">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="agregarProducto()">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                <div id="resultado"></div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/mcdonalds.js"></script>
  </body>
</html>