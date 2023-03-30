<?php
    require '../../modelo/modelo_historial.php';
    $MH = new Modelo_Historial();//Instanciamos
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $consulta = $MH->TrearStockInsumo($id);
    echo json_encode($consulta);

?>