<?php
require_once '../modelo/modelolibro.php';
class librocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $libro=new Modelo();

        $dato=$libro->mostrar("libro", "1");
        require_once '../vista/libro/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/libro/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomlibro=$_POST['txtnomlibro'];
                $alm->codsub=$_POST['cbocodsub'];
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: libro.php");

          }


    }
