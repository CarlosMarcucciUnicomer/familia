<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center ><h4 style="color:black" class="modal-title" id="myModalLabel">Listado de alumnoss </h4></center>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            
        <table class="table table-bordered" id="myTable2" style="color:black">
  <?php
$id = $_GET['id'];
$con = connect();
$sql = "SELECT alum_secc.idaluse, seccion.idsec, seccion.nomsec, alumno.idalum, alumno.noma, alumno.dnia, alumno.apea, alumno.foto FROM alum_secc INNER JOIN seccion ON alum_secc.idsec = seccion.idsec INNER JOIN alumno ON alum_secc.idalum = alumno.idalum WHERE seccion.idsec= '$id'";
$query  =$con->query($sql);
$data =  array();
if($query){
    while($r = $query->fetch_object()){
        $data[] = $r;
    }
}
?>
<?php if(count($data)>0):?>      
            <thead>
               <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Seccion</th>

                <th>aAsistencias</th>
                <th style="display:none;"></th>
                
            </thead>
            
            <tbody class="BusquedaRapida">
                  <?php foreach($data as $e):?>  
                        <tr>
                        <td style="display:none;"> <?php echo $e->idsec;?></td>
                           <td><?php echo $e->idalum;?></td>
                            <td><?php  echo "<img src='../../assets/img/subidas/".$e->foto."'width='50'"; ?></td>
                            
                            <td><?php echo $e->noma;?>&nbsp;<?php echo $e->apea;?></td>
                            <td><?php echo $e->nomsec;?></td>
                            
                            <td>
                                <select class="demo_select2 form-control select2-hidden-accessible" id="asistencia">
                                      <option value="0">Seleccionar</option>
                                      <option value="Asistio">Asistio</option>
                                      <option value="Tarde">Tarde</option>
                                      <option value="Falto">Faltos</option>
                                </select>
                            </td>     
                        </tr>                       
                  <?php endforeach; ?>
                            <?php else:?>
                            <p class="alert alert-warning"><strong>No hay participantes</strong></p>
                            <?php endif; ?>    
                </tbody>
                
                
        </table>
            
            </div>

        </div>
    </div>
</div>
</div>


<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $d->idasisa; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar curso</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    
<form class="form-horizontal" autocomplete="off" action="docente_asisten.php?id=<?php echo $d->idasisa; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                        <select class="material-control tooltips-general" name="presen" data-toggle="tooltip" data-placement="top" title="Elige el grupo">
                        <option disabled="" value="">Seleccione</option>
                        <option value="Presente">Presente</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Ausente">Ausente</option>
                    </select>
                         </div>
                </div>

            </div>
            </div>        
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
                    <button name="update" class="btn btn-primary">Guardar cambios</button>
                </div>          
                    </form>
                </div>
            </div>
        </div>
    </div>