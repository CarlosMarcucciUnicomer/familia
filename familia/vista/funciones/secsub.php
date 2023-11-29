<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$pais = $_POST['paises'];

$query = $conexion->query("SELECT * FROM subgrado WHERE codgra = $pais");

echo '<option value="0">Seleccione el subgrado</option>';

while ( $row = $query->fetch_assoc() )
{

	echo '<option value="' . $row['codsub']. '">' . $row['noms'] . '</option>' . "\n";
}
