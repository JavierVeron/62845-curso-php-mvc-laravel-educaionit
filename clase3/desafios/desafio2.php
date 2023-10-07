<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desafio 2 - Educación IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <?php
            include("class.collection.php");

            $unArray = ["Javier", "Cintia", "Claudio", "Enrique", "Gonzalo", "Pablo", "Pablo"];
            //var_dump($unArray);
            $collection = new Collection($unArray);
            //echo "Total de Alumnos hoy: " .$collection->count() ."<br>";
            //echo "<br>---------<br>";
            
            //echo $collection->each();
            $nuevoArray = $collection->map();
            echo $collection->each($nuevoArray);
            ?>
            </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>