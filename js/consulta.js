var tableconsulta;
function listar_consulta(){
    var finicio = $("#txt_fechainicio").val();
    var ffin = $("#txt_fechafin").val();
    tableconsulta = $("#tabla_consulta_medica").DataTable({
       "ordering":false,   
       "bLengthChange":true,
       "searching": { "regex": false },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/consulta/controlador_consulta_listar.php",
           type:'POST',
           data:{
               fechainicio:finicio,
               fechafin:ffin
           }
       },
       "order":[[1,'asc']],
       "columns":[
           {"defaultContent":""},
           {"data":"paciente_nrodocumento"},
           {"data":"paciente"},
           {"data":"consulta_feregistro"},
           {"data":"medico"},
           {"data":"especialidad_nombre"},
           {"data":"consulta_estatus",
           render: function (data, type, row ) {
                if(data=='PENDIENTE'){
                    return "<span class='label label-primary'>"+data+"</span>";                   
                }else if(data=='CANCELADO'){
                    return "<span class='label label-danger'>"+data+"</span>";   
                } else{
                    return "<span class='label label-success'>"+data+"</span>";                   
                }
            }
           },       
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary' title='ed&iacute;tar'><i class='fa fa-edit'></i></button>&nbsp;"}
       ],

       "language":idioma_espanol,
       select: true
   });


    tableconsulta.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_consulta_medica').DataTable().page.info();
        tableconsulta.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );

}

$('#tabla_consulta_medica').on('click','.editar',function(){
    var data = tableconsulta.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(tableconsulta.row(this).child.isShown()){//Cuando esta en tamaño responsivo
        var data = tableconsulta.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txt_consulta_id").val(data.consulta_id);
    $("#txt_paciente_consultaeditar").val(data.paciente);
    $("#txt_descripcion_consultaeditar").val(data.consulta_descripcion);
    $("#txt_diagnostico_consultaeditar").val(data.consulta_diagnostico);

})

function listar_paciente_combo_consulta(){
    $.ajax({
        "url":"../controlador/consulta/controlador_combo_paciente_cita_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                    cadena+="<option value='"+data[i][0]+"'>Nro Atencion: "+data[i][1]+" - Paciente: "+data[i][2]+"</option>";
            
            }
            $("#cbm_paciente_consulta").html(cadena)
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_paciente_consulta").html(cadena);
        }
    })
}

function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
    $("#txt_descripcion_consulta").val("");
    $("#txt_diagnostico_consulta").val("");
}
function Registrar_Consulta(){
    var idpaciente  =$("#cbm_paciente_consulta").val();
    var descripcion =$("#txt_descripcion_consulta").val();
    var diagnostico =$("#txt_diagnostico_consulta").val();
    if(idpaciente.length==0 || descripcion.length==0 || diagnostico.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    $.ajax({
        "url":"../controlador/consulta/controlador_consulta_registro.php",
        type:'POST',
        data:{
            idpa:idpaciente,
            descripcion:descripcion,
            diagnostico:diagnostico
        }
    }).done(function(resp){
        if(resp>0){
            $("#modal_registro").modal('hide');
            listar_consulta();
            Swal.fire("Mensaje de Confirmaci\u00F3n","Consulta registrada correctamente","success");

        }else{
            Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
        }
    })
}

function Editar_Consulta(){
    var idconsulta  =$("#txt_consulta_id").val();
    var descripcion =$("#txt_descripcion_consultaeditar").val();
    var diagnostico =$("#txt_diagnostico_consultaeditar").val();
    if(idconsulta.length==0 || descripcion.length==0 || diagnostico.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    $.ajax({
        "url":"../controlador/consulta/controlador_consulta_modificar.php",
        type:'POST',
        data:{
            idconsulta:idconsulta,
            descripcion:descripcion,
            diagnostico:diagnostico
        }
    }).done(function(resp){
        if(resp>0){
            $("#modal_editar").modal('hide');
            listar_consulta();
            Swal.fire("Mensaje de Confirmaci\u00F3n","Datos actualizados","success");

        }else{
            Swal.fire("Mensaje De Error","Lo sentimos el registro no se pudo completar","error");
        }
    })
}
