<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$query = $conexion->query("SELECT * FROM autor");

echo '<option value="0">Seleccione un autor</option>';

while ( $row = $query->fetch_assoc() )
{

	echo '<option value="' . $row['idautor']. '">' . $row['datos'] . '</option>' . "\n";
}
