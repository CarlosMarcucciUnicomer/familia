<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$query = $conexion->query("SELECT * FROM subgrado");

echo '<option value="0">Seleccione un subgrado</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['codsub']. '">' . $row['noms'] . '</option>' . "\n";
}
