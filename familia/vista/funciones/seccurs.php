<?php

$conexion = mysqli_connect("localhost","u760722394_dbcolegio_user","UMGAntigua2022","u760722394_dbcolegio");

$curso = $_POST['cursos'];

$query = $conexion->query("SELECT * FROM curso WHERE codsub = $curso");





while ( $row = $query->fetch_assoc() )
{

	echo '<label><input name="curso[]" type="checkbox"  value="' . $row['idcur']. '" >' . $row['nomcur'] . '</label>';













}
