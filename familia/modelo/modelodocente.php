<?php
class Modelo{

  private $docente;
  private $db;

  public function __construct(){
      $this->docente=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT * FROM docente";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->docente[]=$tabla;
      }
      return $this->docente;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO docente (nombre,apellido,dni,genero,correo,
    telefono,imagen,usuario,clave,cargo)VALUES(?,?,?,?,?,?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->nombre,$data->apellido,$data->dni,$data->genero,$data->correo,$data->telefono,$data->imagen,$data->usuario, $data->clave,$data->cargo));

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
