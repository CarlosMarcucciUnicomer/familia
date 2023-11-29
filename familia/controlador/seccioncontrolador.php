<?php
require_once '../modelo/modeloseccion.php';
class seccioncontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $seccion=new Modelo();

        $dato=$seccion->mostrar("seccion", "1");
        require_once '../vista/seccion/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/seccion/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomsec=$_POST['txtnomsec'];
                $alm->codsub=$_POST['cbocodsub'];
                $alm->idalum=$_POST['cboidalum'];
                $alm->iddoce=$_POST['cboiddoce'];
                $alm->estado=$_POST['cboestado'];

                
                
     $this->model->insertar($alm);
     //-------------
header("Location: seccion.php");

          }


    }
