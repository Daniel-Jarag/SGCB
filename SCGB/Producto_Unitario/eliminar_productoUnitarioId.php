<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$CODIGO = $_POST['CODIGO'];
$CODIGOUNITARIO = $_POST['CODIGOUNITARIO'];
$NUMEROFACTURA = $_POST['NUMEROFACTURA'];
$cn->Conectar();

$return_arr = array();
$res = $cn->Consulta("DELETE FROM producto_unitario WHERE CODIGOUNITARIO='$CODIGOUNITARIO' AND CODIGOPRODUCTO='$CODIGO' AND PU_NUMEROFACTURA='$NUMEROFACTURA'");
$cn->Desconectar();
?>