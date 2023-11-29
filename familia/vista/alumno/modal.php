<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $va["idalum"]; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title" style="color:black">Editar alumno.</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" autocomplete="off" action="../folder/alumno.php?id=<?php echo $va["idalum"]; ?>"  
                        role="form" method="post">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">CUI del alumno</label>
                                                <input name="dnia" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $va ['dnia'];?>" type="text" class="form-control">
                                        </div>
                                </div>
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Nombre del alumno</label>
                                                <input name="noma" value="<?php echo $va ['noma'];?>" type="text" class="form-control">
                                        </div>
                                </div>
                            </div>
                            --Bueno
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Apellido del alumno</label>
                                            <input name="apea" value="<?php echo $va ['apea'];?>" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Edad del alumno</label>
                                            <input name="edad" value="<?php echo $va ['edad'];?>" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Direccion</label>
                                            <input name="direcc" value="<?php echo $va ['direcc'];?>" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Correo</label>
                                            <input name="correo" value="<?php echo $va ['correo'];?>" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Sexo</label>
                                            <div class="radio">          
                                                    <input id="demo-inline-form-radio" class="magic-radio"  type="radio" <?php if($va['gene']=="M"){ echo "checked";}?>  name="gene"  value="<?php echo $va['gene']; ?>">
                                                        <label for="demo-disabled-inline-form-radio-2">M</label>
                                                    <input id="demo-inline-form-radio" class="magic-radio"  type="radio" <?php if($va['gene']=="F"){ echo "checked";}?>  name="gene"  value="<?php echo $va['gene']; ?>">
                                                        <label for="demo-disabled-inline-form-radio-3">F</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Fecha de nacimiento</label>
                                                <input name="fenaci" value="<?php echo $va ['fenaci'];?>" type="date" class="form-control">
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
    <div class="modal fade" id="delete_<?php echo $va['idalum']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">    
                <p class="text-center"><strong>¿Esta seguro de Borrar el registro?</strong></p>
                <h2 style="color:black" class="text-center"><?php echo $va['noma'].' '; ?> </h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                
                <a href="../vista/alumno/eliminar.php?id=<?php echo $va['idalum']; ?>" class="btn btn-primary">Sí, eliminalo</a>
            </div>

        </div>
    </div>
</div>

    <!-- CONTRA -->
