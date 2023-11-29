<?php
class Modelo{

  private $curso;
  private $db;

  public function __construct(){
      $this->curso=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT curso.idcur, curso.nomcur, periodo.idper, periodo.nompe, grado.codgra, grado.nomgra, subgrado.codsub, subgrado.noms, curso.foto, curso.estado FROM curso INNER JOIN periodo ON curso.idper = periodo.idper INNER JOIN grado ON curso.codgra = grado.codgra INNER JOIN subgrado ON curso.codsub = subgrado.codsub";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->curso[]=$tabla;
      }
      return $this->curso;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO curso (nomcur, idper,codgra,codsub,idsec,idalum,iddoce,foto,estado)VALUES(?,?,?,?,?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->nomcur, $data->idper, $data->codgra,$data->codsub,$data->idsec,$data->idalum,$data->iddoce,$data->foto,$data->estado));

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
