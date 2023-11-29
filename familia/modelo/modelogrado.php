<?php
class Modelo{

  private $grado;
  private $db;

  public function __construct(){
      $this->grado=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT grado.codgra, periodo.idper, periodo.nompe, grado.nomgra FROM grado INNER JOIN periodo ON grado.idper = periodo.idper";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->grado[]=$tabla;
      }
      return $this->grado;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO grado (idper, nomgra)VALUES(?,?)";

      $this->db->prepare($query)->execute(array($data->idper, $data->nomgra));

    }catch (Exception $e) {

      die($e->getMessage());
    }
    }
	
  public function actualizar($tabla,$data,$condicion){
      $consulta="UPDATE $tabla SET $data WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
  public function eliminar($tabla,$condicion){
      $consulta="DELETE FROM $tabla WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
}

 ?>
