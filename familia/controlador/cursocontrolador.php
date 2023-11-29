<?php
require_once '../modelo/modelocurso.php';
class cursocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $curso=new Modelo();

        $dato=$curso->mostrar("curso", "1");
        require_once '../vista/curso/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/curso/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomcur=$_POST['txtnomcur'];
                $alm->idper=$_POST['cboidper'];
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: curso.php");

          }


    }
