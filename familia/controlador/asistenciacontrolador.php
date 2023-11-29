<?php
require_once '../modelo/modeloasistencia.php';
class asistenciacontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $asisten_alumn=new Modelo();

        $dato=$asisten_alumn->mostrar("asisten_alumn", "1");
        require_once '../vista/asistencia/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/asistencia/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->idalum=$_POST['txtidalum'];
                
     $this->model->insertar($alm);
     //-------------
header("Location: asistencia.php");

          }


    }
