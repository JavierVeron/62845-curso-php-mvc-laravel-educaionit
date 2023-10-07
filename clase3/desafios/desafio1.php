<?php
include("class.database.php");

$db = Database::connect();

// Select
/* $sql = "SELECT * FROM articulos";
Database::query($sql);
$result = Database::select();

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //echo $result["nombre"];
    echo $row["nombre"] ." => $" .$row["precio"] ."<br>";
} */

// INSERT
//$sql = "INSERT INTO usuarios (nombre, apellido, email, clave) VALUES ('Pablo', 'Fossa', 'pablo.fosa@gmail.com', 'pablo123*')";
// UPDATE
//$sql = "UPDATE usuarios SET clave = '" .md5("pablo123*") ."' WHERE id = 5";
// DELETE
$sql = "DELETE from usuarios WHERE id = 5";

Database::query($sql);
$result = Database::execute();
echo $result ? "La consulta se ejecutó correctamente!" : "Error! No se pudo ejecutar la consulta!";
