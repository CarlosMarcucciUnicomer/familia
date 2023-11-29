<?php
require_once '../modelo/modeloperiodo.php';
class periodocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $periodo=new Modelo();

        $dato=$periodo->mostrar("periodo", "1");
        require_once '../vista/reportes/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/reportes/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nompe=$_POST['txtnompe'];
                
     $this->model->insertar($alm);
     //-------------
header("Location: reportes.php");

          }


    }