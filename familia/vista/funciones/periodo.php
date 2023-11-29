<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$query = $conexion->query("SELECT * FROM periodo");

echo '<option value="0">Seleccione un periodo</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['idper']. '">' . $row['nompe'] . '</option>' . "\n";
}
