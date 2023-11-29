<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$curso = $_POST['cursos'];

$query = $conexion->query("SELECT * FROM curso WHERE codsub = $curso");
echo '<option value="0">Seleccione la materia</option>';

while ( $row = $query->fetch_assoc() )
{

	echo '<option value="' . $row['idcur']. '">' . $row['nomcur'] . '</option>' . "\n";


}
