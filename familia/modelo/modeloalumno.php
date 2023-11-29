<?php
class Modelo{

  private $alumno;
  private $db;

  public function __construct(){
      $this->alumno=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT * FROM  alumno";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->alumno[]=$tabla;
      }
      return $this->alumno;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO alumno (dnia, noma,apea,edad,direcc,correo,gene,fenaci,foto,estado)VALUES(?,?,?,?,?,?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->dnia, $data->noma,$data->apea,$data->edad,$data->direcc,$data->correo,$data->gene,$data->fenaci,$data->foto,$data->estado));

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
