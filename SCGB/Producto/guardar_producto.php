<?php
include '../Conexion.php';
$cn = new Conexion();

$CODIGO = $_POST['CODIGO'];
$NOMBRE = $_POST['NOMBRE'];
$MARCA = $_POST['MARCA'];
$MODELO = $_POST['MODELO'];
$OBSERVACION = $_POST['OBSERVACION'];
$IDENTIFICADOR = $_POST['IDENTIFICADOR'];

$cn->Conectar();
$return_arr = array();

$res = $cn->Consulta("INSERT INTO producto(CODIGOPRODUCTO,P_NOMBRE,P_MARCA,P_MODELO,P_OBSERVACION,P_IDENTIFICADOR,P_ESTADO) VALUES('$CODIGO','$NOMBRE','$MARCA','$MODELO','$OBSERVACION','$IDENTIFICADOR',1)");

$cn->Desconectar();
?>
