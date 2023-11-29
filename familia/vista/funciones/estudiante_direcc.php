<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$el_continente = $_POST['continente'];

$query = $conexion->query("SELECT * FROM alumno WHERE idalum = $el_continente");



while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['idalum']. '">' . $row['direcc'] . '</option>' . "\n";
}
