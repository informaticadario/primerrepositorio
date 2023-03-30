var tablepaciente;
function listar_paciente(){
    tablepaciente = $("#tabla_paciente").DataTable({
       "ordering":false,   
       "bLengthChange":false,
       "searching": { "regex": false },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/paciente/controlador_paciente_listar.php",
           type:'POST'
       },
       "order":[[1,'asc']],
       "columns":[
           {"defaultContent":""},
           {"data":"paciente_nrodocumento"},
           {"data":"paciente"},
           {"data":"paciente_credencial"}, 
           {"data":"paciente_direccion"},
           {"data":"paciente_sexo",
           render: function (data, type, row ) {
                if(data=='M'){
                    return "MASCULINO";                   
                }else{
                    return "FEMENINO"; 
                }
            }
           },  
           {"data":"paciente_estatus",
           render: function (data, type, row ) {
                if(data=='ACTIVO'){
                    return "<span class='label label-success'>"+data+"</span>";                   
                }
                if(data=='INACTIVO'){
                    return "<span class='label label-danger'>"+data+"</span>";                   
                }
                if(data=='AGOTADO'){
                    return "<span class='label label-black' style='background:black'>"+data+"</span>";                   
                }
            }
        },   
           
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary' title='ed&iacute;tar'><i class='fa fa-edit'></i></button>"}
       ],

       "language":idioma_espanol,
       select: true
   });
   document.getElementById("tabla_paciente_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

    tablepaciente.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_paciente').DataTable().page.info();
        tablepaciente.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}

$('#tabla_paciente').on('click','.editar',function(){
    var data = tablepaciente.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(tablepaciente.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = tablepaciente.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txt_idpaciente").val(data.paciente_id);
    $("#txt_ndoc_actual_editar").val(data.paciente_nrodocuemento);
    $("#txt_ndoc_nuevo_editar").val(data.paciente_nrodocuemento);
    $("#txt_nombres_editar").val(data.paciente_nombre);
    $("#txt_apepat_editar").val(data.paciente_apepat);
    $("#txt_apemat_editar").val(data.paciente_apemat);
    $("#txt_credencial_editar").val(data.paciente_credencial);
    $("#txt_direccion_editar").val(data.paciente_direccion);
    $("#cbm_sexo_editar").val(data.paciente_sexo).trigger("change");
    $("#cbm_estatus").val(data.paciente_estatus).trigger("change");
})

function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
    $("#txt_nombres").val("");
    $("#txt_apepat").val("");
    $("#txt_apemat").val("");
    $("#txt_credencial").val("");
    $("#txt_direccion").val("");
    $("#cbm_sexo").val("M").trigger("change");
    $("#txt_ndoc").val("");
}

function filterGlobal() {
    $('#tabla_paciente').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function Registrar_Paciente(){
    var nombres = $("#txt_nombres").val();
    var apepat  = $("#txt_apepat").val();
    var apemat  = $("#txt_apemat").val();
    var credencial = $("#txt_credencial").val();
    var direccion = $("#txt_direccion").val();
    var sexo    = $("#cbm_sexo").val();
    var nrodocumento = $("#txt_ndoc").val();

    if(nombres.length==0 || apepat.length==0 || apemat.length==0 || credencial.length==0 ||direccion.length==0 || sexo.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    $.ajax({
        "url":"../controlador/paciente/controlador_paciente_registro.php",
        type:'POST',
        data:{
            nombres:nombres,
            apepat:apepat,
            apemat:apemat,
            credencial:credencial,
            direccion:direccion,
            sexo:sexo,
            nrodocumento:nrodocumento
        }
    }).done(function(resp){
        if(resp>0){
                if(resp==1){
                    $("#modal_registro").modal('hide');
                    listar_paciente();
                    //LimpiarCampos();
                    Swal.fire("Mensaje De Confirmacion","Datos guardados correctamente, paciente registrado","success");
                    
                }else{
                    LimpiarCampos();
                    Swal.fire("Mensaje De Advertencia","El paciente ya existe en nuestra data","warning");  
                }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
        }
    })
}

function LimpiarCampos(){
    $("#txt_insumo").val("");
    $("#txt_stock").val("");
}


function Modificar_Paciente(){
    var id =$("#txt_idpaciente").val();
    var nombres  =$("#txt_nombres_editar").val();
    var apepat   =$("#txt_apepat_editar").val();
    var apemat =$("#txt_apemat_editar").val();
    var credencial  =$("#txt_credencial_editar").val();
    var direccion  =$("#txt_direccion_editar").val();
    var sexo   =$("#cbm_sexo_editar").val();
    var nrodocumentoactual   =$("#txt_ndoc_actual_editar").val();
    var nrodocumentonuevo   =$("#txt_ndoc_nuevo_editar").val();
    var estatus   =$("#cbm_estatus").val();

    if(nombres.length==0 || nombres.length==0 || apepat.length==0 || apemat.length==0 ||  credencial.length==0 || direccion.length==0 || sexo.length==0 || nrodocumentonuevo.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    $.ajax({
        "url":"../controlador/paciente/controlador_paciente_modificar.php",
        type:'POST',
        data:{
            id:id,
            nombres:nombres,
            apepat:apepat,
            apemat:apemat,
            credencial:credencial,
            direccion:direccion,
            sexo:sexo,
            nrodocumentoactual:nrodocumentoactual,
            nrodocumentonuevo:nrodocumentonuevo,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
                if(resp==1){
                    $("#modal_editar").modal('hide');
                    listar_paciente();
                    //LimpiarCampos();
                    Swal.fire("Mensaje De Confirmacion","Datos actualizados correctamente, paciente registrado","success");
                    
                }else{
                    //LimpiarCampos();
                    Swal.fire("Mensaje De Advertencia","El nro de docuemtno ya existe en nuestra data","warning");  
                }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
        }
    })
}