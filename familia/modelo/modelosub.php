<?php
class Modelo{

  private $subgrado;
  private $db;

  public function __construct(){
      $this->subgrado=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT subgrado.codsub, grado.codgra, grado.nomgra, subgrado.noms, subgrado.estado, subgrado.fecre  FROM subgrado INNER JOIN grado ON subgrado.codgra = grado.codgra";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->subgrado[]=$tabla;
      }
      return $this->subgrado;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO subgrado (codgra, noms,estado)VALUES(?,?,?)";

      $this->db->prepare($query)->execute(array($data->codgra, $data->noms, $data->estado));

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
