<?php
require_once '../modelo/modeloauto.php';
class autocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $autor=new Modelo();

        $dato=$autor->mostrar("autor", "1");
        require_once '../vista/autor/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/autor/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomaut=$_POST['txtnomaut'];
                $alm->apeaut=$_POST['txtapeaut'];
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: autor.php");

          }


    }
