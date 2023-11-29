<?php
ob_start();
  $host = "localhost";
  $username = "u760722394_dbcolegio_user";
  $password = "UMGAntigua2022";
  $dbname = "u760722394_dbcolegio";

  try {
    $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $exception){
    die("Connection error: " . $exception->getMessage());
  }
if(isset($_POST['agregar'])){
  $nomsec = htmlentities($_POST['nomsec']);
  $codsub = htmlentities($_POST['codsub']);
  $iddoce = htmlentities($_POST['iddoce']);
  $idcur = addslashes(implode(", ", $_POST['idcur']));
  $capa = htmlentities($_POST['capa']);
  $estado = htmlentities($_POST['estado']);

  $query = $db->prepare("INSERT INTO `seccion`(`nomsec`, `codsub`, `iddoce`, `idcur`,`capa`,`estado`)
  VALUES (:nomsec,:codsub,:iddoce,:idcur,:capa,:estado)");
  $query->bindParam(":nomsec", $nomsec);
  $query->bindParam(":codsub", $codsub);
  $query->bindParam(":iddoce", $iddoce);
  $query->bindParam(":idcur", $idcur);
  $query->bindParam(":capa", $capa);
  $query->bindParam(":estado", $estado);
  $query->execute();
  header("location: ../../folder/seccion.php");		
	}
?>