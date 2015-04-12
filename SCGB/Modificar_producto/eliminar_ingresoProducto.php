<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$RUT = $_POST['RUT'];
$NUMEROFACTURA = $_POST['NUMEROFACTURA'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("DELETE FROM ingreso_producto WHERE CODIGOPRODUCTO='$CODIGO' AND NUMEROFACTURA='$NUMEROFACTURA' AND RUT='$RUT'");
$cn->Desconectar();
?>