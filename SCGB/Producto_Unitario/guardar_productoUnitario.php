<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$CODIGO = $_POST['CODIGO'];
$CANTIDAD = $_POST['CANTIDAD'];
$NUMEROFACTURA = $_POST['NUMEROFACTURA'];
$cn->Conectar();
$cn2->Conectar();

for ( $i = 0 ; $i < $CANTIDAD ; $i ++) {
  $return_arr = array();
  $res = $cn->Consulta("Select count(CODIGOUNITARIO)+1 AS ID from producto_unitario WHERE CODIGOPRODUCTO='$CODIGO'");
  while ($row = $cn->getRespuesta($res)){
  $CODIGOUNITARIO=$row['ID'];
    }//fin del while
   $return_arr2 = array();
   $res2 = $cn2->Consulta("INSERT INTO producto_unitario(CODIGOPRODUCTO,CODIGOUNITARIO,PU_ESTADO,PU_NUMEROFACTURA) VALUES('$CODIGO',$CODIGOUNITARIO,1,'$NUMEROFACTURA')");
 }//fin del for

$cn->Desconectar();
$cn2->Desconectar();
?>