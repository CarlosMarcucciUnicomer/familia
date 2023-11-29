<?php
require_once '../modelo/modeloalumno.php';
class alumnocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $alumno=new Modelo();

        $dato=$alumno->mostrar("alumno", "1");
        require_once '../vista/alumno/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/alumno/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->dnia=$_POST['txtdnia'];
                $alm->noma=$_POST['txtnoma'];
                $alm->apea=$_POST['txtapea'];
                $alm->edad=$_POST['txtedad'];
                $alm->direcc=$_POST['txtdirecc'];
                $alm->correo=$_POST['txtcorreo'];
                $alm->gene=$_POST['txtgene'];
                $alm->fenaci=$_POST['txtfenaci'];
                $alm->foto=$_POST['txtfoto'];
                $alm->estado=$_POST['txtestado'];
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: alumno.php");

          }


    }
