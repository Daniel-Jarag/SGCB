<?php
include '../Conexion.php';
$cn = new Conexion();
$NUMEROFACTURA = $_POST['NUMEROFACTURA'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("DELETE FROM ingreso_producto
 WHERE NUMEROFACTURA='$NUMEROFACTURA' ");
$cn->Desconectar();
?>