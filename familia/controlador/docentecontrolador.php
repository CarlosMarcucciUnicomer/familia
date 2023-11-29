<?php
require_once '../modelo/modelodocente.php';
class docentecontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $docente=new Modelo();

        $dato=$docente->mostrar("docente", "1");
        require_once '../vista/docente/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/docente/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nombre=$_POST['txtnom'];
                $alm->apellido=$_POST['txtape'];
                $alm->dni=$_POST['txtdni'];
                $alm->genero=$_POST['cbogene'];
                $alm->correo=$_POST['txtcorr'];
                $alm->telefono=$_POST['txttele'];
                $alm->imagen=$_POST['txtima'];
                $alm->usuario=$_POST['txtusu'];

                $alm->clave=MD5($_POST['txtcla']);
                
				$alm->cargo=$_POST['txtcar'];
            

     $this->model->insertar($alm);
     //-------------
header("Location: docente.php");

          }


    }
