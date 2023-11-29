<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$el_continente = $_POST['continente'];

$query = $conexion->query("SELECT * FROM grado WHERE idper = $el_continente");

echo '<option value="0">Seleccione el grado</option>';

while ( $row = $query->fetch_assoc() )
{

	echo '<option value="' . $row['codgra']. '">' . $row['nomgra'] . '</option>' . "\n";
}
