<?php
class Modelo{

  private $seccion;
  private $db;

  public function __construct(){
      $this->seccion=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT seccion.idsec, seccion.nomsec, subgrado.codsub, subgrado.noms, seccion.estado, seccion.capa, docente.iddoce, docente.nombre, docente.apellido, docente.dni, docente.correo, docente.imagen, docente.telefono, curso.idcur, curso.nomcur, curso.foto FROM seccion INNER JOIN subgrado ON seccion.codsub = subgrado.codsub INNER JOIN docente ON seccion.iddoce =  docente.iddoce INNER JOIN curso ON seccion.idcur = curso.idcur";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->seccion[]=$tabla;
      }
      return $this->seccion;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO seccion (nomsec, codsub,idalum,iddoce,estado)VALUES(?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->nomsec, $data->codsub, $data->idalum,$data->iddoce,$data->estado));

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
