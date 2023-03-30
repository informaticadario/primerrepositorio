<?php
    require '../../modelo/modelo_paciente.php';
    $MP = new Modelo_Paciente();//Instanciamos
    $consulta = $MP->listar_paciente();
    if($consulta){
        echo json_encode($consulta);
    }else{
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }
?>