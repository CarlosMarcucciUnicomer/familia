<?php
class Modelo{

  private $libro;
  private $db;

  public function __construct(){
      $this->libro=array();
      $this->db=new PDO('mysql:host=localhost;dbname=u760722394_dbcolegio',"u760722394_dbcolegio_user","UMGAntigua2022");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT libro.idlibro, libro.nomlibro, subgrado.codsub, subgrado.noms, curso.idcur, curso.nomcur,autor.idautor, 
autor.datos, autor.biog, autor.foto, edito.idedito, edito.nomedi, libro.img, 
libro.sinop, libro.pag, libro.aniopub, libro.precio,libro.stock ,libro.estado, libro.idio, 
libro.fere FROM libro INNER JOIN subgrado ON libro.codsub=subgrado.codsub 
INNER JOIN autor ON libro.idautor=autor.idautor 
INNER JOIN edito ON libro.idedito= edito.idedito
INNER JOIN curso ON libro.idcur =curso.idcur";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->libro[]=$tabla;
      }
      return $this->libro;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO libro (nomlibro)VALUES(?)";

      $this->db->prepare($query)->execute(array($data->nomlibro));

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
