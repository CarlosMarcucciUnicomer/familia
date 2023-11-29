<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$query = $conexion->query("SELECT * FROM grado");

echo '<option value="0">Seleccione un grado</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['codgra']. '">' . $row['nomgra'] . '</option>' . "\n";
}
