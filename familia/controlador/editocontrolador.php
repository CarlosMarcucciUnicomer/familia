<?php
require_once '../modelo/modeloedito.php';
class editocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $edito=new Modelo();

        $dato=$edito->mostrar("edito", "1");
        require_once '../vista/edito/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/edito/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomedi=$_POST['txtnomedi'];
               
                
     $this->model->insertar($alm);
     //-------------
header("Location: edito.php");

          }


    }
