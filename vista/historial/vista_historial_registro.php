<script type="text/javascript" src="../js/historial.js?rev=<?php echo time();?>"></script>
<form autocomplete="false" onsubmit="return false">
<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTO DE REGISTRO DE HISTORIAL CLINICO</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool"  data-widget = "collapse" data-widget = "remove"><i class="fa fa-minus"></i>
                </button>
            </div>
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-lg-2">
                    <label for="">C&oacute;digo historial</label>
                    <input type="text"  id="txt_codhistorial" class="form-control" disabled>
                </div>
                <div class="col-lg-8">
                    <label for="">Paciente</label>
                    <input type="text" id="txt_paciente" class="form-control" disabled>
                </div>
                <div class="col-lg-2">
                    <label for="">&nbsp;</label><br>
                    <button class="btn btn-success" onclick="AbrilModalConsulta()"><i class="fa fa-search"></i>Buscar Consulta</button>
                </div>
                <div class="col-lg-6"><br>
                    <label for="">Descripci&oacute;n de La Consulta</label>
                    <textarea name="" id="txt_desconsulta" cols="30" rows="3" disabled class="form-control"></textarea>
                </div>
                <div class="col-lg-6"><br>
                    <label for="">Diagnostico de La Consulta</label>
                    <textarea name="" id="txt_diagconsulta" cols="30" rows="3" disabled class="form-control"></textarea>
                </div>
                <input type="text" id="txt_idconsulta" hidden>
                <div class="col-md-12"><br>
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Procedimiento</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Insumo</a></li>
                        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Medicamentos</a></li>
                        </ul>
                        <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="col-lg-10">
                                    <label for="">Seleccionar Procedimientos</label>
                                    <select class="js-example-basic-single" name="state" id="cbm_procedimiento" style="width:100%;">
                                    </select>

                                </div>
                                <div class="col-lg-2">
                                    <label for="">&nbsp;</label><br>
                                    <button class="btn btn-primary" style="width:100%;" onclick="Agregar_Procedimiento()"><i class="fa fa-plus-square"></i>&nbsp;Agregar</button>
                                </div>
                                <div class="col-lg-12 table-responsive"><br>
                                    <table id="tabla_procedimiento" style="width:100%" class="table">
                                        <thead bgcolor="black" style="color:#FFFFFF;">
                                            <th>ID</th>
                                            <th>Procedimiento</th>
                                            <th>Acci&oacute;n</th>
                                        </thead>
                                        <tbody id="tbody_tabla_procedimiento">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Seleccionar Insumos</label>
                                    <select class="js-example-basic-single" name="state" id="cbm_insumos" style="width:100%;">

                                    </select>

                                </div>
                                <div class="col-lg-2">
                                    <label for="">Stock Actual</label>
                                    <input type="text" class="form-control" id="stock_insumo" disabled>
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Cantidad Agregar</label>
                                    <input type="text" class="form-control" id="txt_cantidad_agregar">
                                </div>
                                <div class="col-lg-2">
                                    <label for="">&nbsp;</label><br>
                                    <button class="btn btn-primary" style="width:100%;" onclick="Agregar_Insumo()"><i class="fa fa-plus-square"></i>&nbsp;Agregar</button>
                                </div>
                                <div class="col-lg-12 table-responsive"><br>
                                    <table id="tabla_insumo" style="width:100%" class="table">
                                        <thead bgcolor="black" style="color:#FFFFFF;">
                                            <th>ID</th>
                                            <th>Insumo</th>
                                            <th>Cantidad</th>
                                            <th>Acci&oacute;n</th>
                                        </thead>
                                        <tbody id="tbody_tabla_insumo">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Seleccionar Medicamento</label>
                                    <select class="js-example-basic-single" name="state" id="cbm_medicamento" style="width:100%;">

                                    </select>

                                </div>
                                <div class="col-lg-2">
                                    <label for="">Stock Actual</label>
                                    <input type="text" class="form-control" id="stock_medicamento" disabled>
                                </div>
                                <div class="col-lg-2">
                                    <label for="">Cantidad Agregar</label>
                                    <input type="text" class="form-control" id="txt_medicantidad_agregar">
                                </div>
                                <div class="col-lg-2">
                                    <label for="">&nbsp;</label><br>
                                    <button class="btn btn-primary" style="width:100%;" onclick="Agregar_Medicamento()"><i class="fa fa-plus-square"></i>&nbsp;Agregar</button>
                                </div>
                                <div class="col-lg-12 table-responsive"><br>
                                    <table id="tabla_medicamento" style="width:100%" class="table">
                                        <thead bgcolor="black" style="color:#FFFFFF;">
                                            <th>ID</th>
                                            <th>Medicamento</th>
                                            <th>Cantidad</th>
                                            <th>Acci&oacute;n</th>
                                        </thead>
                                        <tbody id="tbody_tabla_medicamento">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
                <div class="col-lg-12" style="text-align:center">
                    <button class="btn btn-success btn-lg" onclick="Registrar_Historial()">REGISTRAR</button>
                </div>
            
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
</form>
<div class="modal lg" id="modal_consultas" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Listado De Consultas Medicas</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <table id="tabla_consulta_historial" class="display responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>C&oacute;digo Historial</th>
                                    <th>Paciente</th>
                                    <th>Acci&oacute;n</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>    

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    listar_insumo();
    listar_procedimiento();
    listar_medicamento();
});
$("#cbm_medicamento").change(function() {
         var id=$("#cbm_medicamento").val();
         TrearStockMedicamento(id);
});
$("#cbm_insumos").change(function() {
         var id=$("#cbm_insumos").val();
         TrearStockInsumo(id);
});
$('.box').boxWidget({
    animationSpeed : 500,
    collapseTrigger: '[data-widget="collapse"]',
    removeTrigger  : '[data-widget="remove"]',
    collapseIcon   : 'fa-minus',
    expandIcon     : 'fa-plus',
    removeIcon     : 'fa-times'
})
</script>
