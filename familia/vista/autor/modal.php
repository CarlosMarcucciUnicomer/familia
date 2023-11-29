<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $va["idautor"]; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar autores</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" action="../folder/autor.php?id=<?php echo $va["idautor"]; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row" style="margin-top:-30px">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombres del autor</label>
                                <input name="datos" value="<?php echo $va ['datos'];?>" type="text" class="form-control">
                         </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Biografia de los autores</label>
                        <textarea name="biog" value="<?php echo $va ['biog'];?>" rows="13" class="form-control"><?php echo $va ['biog'];?></textarea>
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
<!--  -->

    <!-- ELIMINAR -->
    <div class="modal fade" id="delete_<?php echo $va['idautor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $va['datos'].' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="../vista/autor/eliminar.php?id=<?php echo $va['idautor']; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>

    <!-- CONTRA -->
