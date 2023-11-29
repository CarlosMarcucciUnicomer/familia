<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $va["idper"]; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar periodo</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    

<form class="form-horizontal" autocomplete="off" action="../folder/periodo.php?id=<?php echo $va["idper"]; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Nombre del periodo</label>
                                <input name="nompe" value="<?php echo $va ['nompe'];?>" type="text" class="form-control">
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
    <div class="modal fade" id="delete_<?php echo $va['idper']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $va['nompe'].' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="../vista/periodo/eliminar.php?id=<?php echo $va['idper']; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>

    <!-- CONTRA -->
