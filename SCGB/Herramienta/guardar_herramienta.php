<?php
include '../Conexion.php';
$cn = new Conexion();
$CODIGO = $_POST['CODIGO'];
$TIPOHERRAMIENTA = $_POST['TIPOHERRAMIENTA'];
$FRECUENCIA = $_POST['FRECUENCIA'];
$POTENCIA = $_POST['POTENCIA'];
$cn->Conectar();
$res = $cn->Consulta("INSERT INTO herramienta(CODIGOPRODUCTO,H_TIPOHERRAMIENTA,H_FRECUENCIA,H_POTENCIAMAXIMA) VALUES('$CODIGO','$TIPOHERRAMIENTA',$FRECUENCIA,'$POTENCIA')");
$cn->Desconectar();
?>
