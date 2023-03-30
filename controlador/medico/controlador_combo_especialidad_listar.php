<?php
    require '../../modelo/modelo_medico.php';
    $MM = new Modelo_Medico();//Instanciamos
    $consulta = $MM->listar_especialidad_combo();
    echo json_encode($consulta);

?>