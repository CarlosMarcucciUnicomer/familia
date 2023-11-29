<?php
class Modelo{

  private $edito;
  private $db;

  public function __construct(){
      $this->edito=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT * FROM edito";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->edito[]=$tabla;
      }
      return $this->edito;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO edito (nomedi)VALUES(?)";

      $this->db->prepare($query)->execute(array($data->nomedi));

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
