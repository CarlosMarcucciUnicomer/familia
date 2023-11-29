<?php
require_once '../modelo/modelosub.php';
class subcontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $subgrado=new Modelo();

        $dato=$subgrado->mostrar("subgrado", "1");
        require_once '../vista/sub/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/sub/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->idper=$_POST['cboano'];
                $alm->nomgra=$_POST['txtnomgra'];
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: sub.php");

          }


    }
