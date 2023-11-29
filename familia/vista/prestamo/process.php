<?php 
session_start();
$con  = new mysqli("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");
if(!empty($_POST)){
$q1 = $con->query("insert into prestamo(fecha,estado,idalum) value(NOW(), \"$_POST[estado]\", \"$_POST[idalum]\")");
if($q1){
$idprest = $con->insert_id;
foreach($_SESSION["cart"] as $c){
$q1 = $con->query("insert into libro_prestamo(idlibro,canti,idprest) value($c[idlibro],$c[canti],$idprest)");
$q1 = $con->query
			("update libro SET stock = '$c[stock]' - $c[canti] WHERE idlibro = $c[idlibro];");

			
}
unset($_SESSION["cart"]);
}
}
print "<script>alert('Prestamo procesada exitosamente');window.location='mostrar.php';</script>";
?>