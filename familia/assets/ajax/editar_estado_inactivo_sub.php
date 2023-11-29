<?php
$hostname_conex = "localhost";
$database_conex = "u760722394_dbcolegio";
$username_conex = "u760722394_dbcolegio_user";
$password_conex = "UMGAntigua2022";
// creación de la conexión a la base de datos con mysql_connect()
$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or 
die ("No se ha podido conectar al servidor de Base de datos"); 

?>
<?php
$id = $_GET['id'];
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
$deleteSQL = sprintf("UPDATE subgrado SET estado='1' WHERE codsub=$id ");
  $Result1 = mysqli_query( $conex, $deleteSQL) or die(mysqli_error($conex));
if($Result1==true)
{
  echo 1;
   }
 else 
 {
  echo 0;
   }
}
?>