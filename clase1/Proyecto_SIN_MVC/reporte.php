<?php
/**
 * @author educacionit
 * @copyright 2008
 */

$hostname 	=	'localhost';
$username 	= 	'root';
$password	= 	'';
$dbname 	= 	'phpdb';
// abro la conexion
$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

// preparo la query para obtener los codigos de todas los productos
$stmt = $pdo->query("SELECT * FROM productos");

?>

<table width=60% align="left" cellpadding="0" cellspacing="0" border=2>
<tr>
	<td>Codigo</td>
	<td>categoria</td>
	<td>Nombre</td>
	<td>Precio</td>
	<td>Stock</td>
</tr>


<?php
//traigo uno por uno los registros de la query
while($campos=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>

	<tr>
		<td><?php echo $campos['cod_producto']?></td>
		<td><?php echo $campos['cod_categoria']?></td>
		<td><?php echo $campos['nombre']?></td>
		<td><?php echo $campos['precio']?></td>
		<td><?php echo $campos['stock']?></td>
		
	</tr>
	
<?php } ?>	
	
</table>