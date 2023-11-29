

<!-- EDITAR -->
<div class="modal fade" id="edit_<?php echo $d->idasisa; ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true" style="color:black">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" style="color:black">Editar asistencia</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    
<form class="form-horizontal" autocomplete="off" action="docente_asisten.php?id=<?php echo $d->idasisa; ?>"  role="form" method="post">
                <div class="panel-body">
            
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Asistencia</label>
                        <select class="demo_select2 form-control select2-hidden-accessible" name="presen" data-toggle="tooltip" data-placement="top" title="Elige el grupo">
                        <option  value="<?php echo $d->presen; ?>"><?php echo $d->presen; ?></option>
                        <option value="Asistio">Asistio</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Falto">Falto</option>
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
