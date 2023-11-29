<?php
class Modelo{

  private $asisten_alumn;
  private $db;

  public function __construct(){
      $this->asisten_alumn=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT asisten_alumn.idasisa, alumno.idalum, alumno.dnia, alumno.noma, alumno.apea, alumno.foto, alumno.direcc, alumno.correo, docente.iddoce, docente.nombre, docente.apellido, docente.dni, docente.imagen, seccion.idsec, seccion.nomsec,asisten_alumn.presen,asisten_alumn.fecha_create ,GROUP_CONCAT(subgrado.codsub, '..', subgrado.noms, '..' SEPARATOR '__') AS subgrado FROM asisten_alumn INNER JOIN alumno ON asisten_alumn.idalum = alumno.idalum INNER JOIN docente ON asisten_alumn.iddoce = docente.iddoce INNER JOIN seccion ON asisten_alumn.idsec = seccion.idsec INNER JOIN subgrado ON subgrado.codsub =seccion.codsub WHERE seccion.idsec GROUP BY asisten_alumn.idasisa";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->asisten_alumn[]=$tabla;
      }
      return $this->asisten_alumn;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO asisten_alumn (idalum)VALUES(?)";

      $this->db->prepare($query)->execute(array($data->idalum));

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
