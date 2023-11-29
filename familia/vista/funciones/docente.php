<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$query = $conexion->query("SELECT * FROM docente");

echo '<option value="0">Seleccione un docente</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['iddoce']. '">' . $row['nombre'] . ' ' . $row['apellido'] . '</option>' . "\n";
}
