<? session_start();
include ("../include/conectar.php");
$CODIGO= $_SESSION["PERMISO"];
?>
<!DOCTYPE html>
<html lang="es"> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8" />
   <title>Bureau Veritas|Cesmec S.C.G.B </title>
   <link rel="shortcut icon" href="../favicon.ico">
   <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="../assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" type="text/css" href="../assets/plugins/chosen-bootstrap/chosen/chosen.css" />
  <link rel="stylesheet" href="../css_mantenedoressd/alertify.core.css" />
  <link rel="stylesheet" href="../css_mantenedoressd/alertify.default.css" />
  <link rel="stylesheet" type="text/css" href="../css_mantenedoressd/jquery.msgbox.css" />
    


   
</head> 
   
<body class="fixed-top">
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <!-- BEGIN LOGO -->
      <a class="brand" href="../inicio.php"> <img src="../assets/img/logo.png" alt="Conquer" /> </a>
      <!-- END LOGO -->
      <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="arrow"></span></a>
      <div class="top-nav">
        <? $sql = "SELECT COUNT( p.P_NOMBRE )as NUMERO FROM producto p, stock s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rs=mysql_query($sql,$conexion);	
	while ($row=mysql_fetch_array($rs)){
              ?>
        <ul class="nav pull-right" id="top_menu">
          <li class="divider-vertical hidden-phone hidden-tablet"></li>
          <li  class="dropdown-toggle" id="header_notification_bar"> <a id="pulsate-regular" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-warning-sign"></i> <span class="label label-important">
            <?=$row["NUMERO"];?>
            </span></a>
            <ul class="dropdown-menu extended notification active">
              <li>
                <p>tienes
                  <?=$row["NUMERO"]; }?>
                  nuevas  notificaciones</p>
              </li>
              <?
  
	$sql1 = "SELECT p.P_NOMBRE, s.S_CANTIDAD FROM producto p, stock s WHERE p.CODIGOPRODUCTO = s.CODIGOPRODUCTO AND p.P_ESTADO =1 AND s.S_CANTIDAD <= s.S_CANTIDADMINIMA ";
	conectar();
	$rss=mysql_query($sql1,$conexion);		
	while ($row=mysql_fetch_array($rss)){
	
  ?>
              <li> <a href="#"> <span class="label label-important"><i class="icon-bolt"></i></span> Bajo stock
                <?=$row["P_NOMBRE"];?>
                quedan <span class="small italic">
                  <?=$row["S_CANTIDAD"];?>
                </span> en Bodega. </a></li>
              <?
						}?>
              <li> <a href="#">Ver todas las notificaciones</a></li>
            </ul>
          </li>
          <li class="divider-vertical hidden-phone hidden-tablet"></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="../calendario/calendario.php"><i class="icon-calendar"></i> Calendario</a></li>
              <li class="divider"></li>
              <li> <a href="#"><i class="icon-user"> </i>
                <?php
                          if(!isset($_SESSION["USUARIO"]))
                            header ("Location:../index.php");
                          else   
                           echo "<strong>" .$_SESSION["USUARIO"]." </strong>";
                         ?>
                </a>
              <li><a href="#"></a><a href="../logout.php"><i class="icon-key"></i> cerrar secion</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="container" class="row-fluid">
	  
  <div id="sidebar" class="nav-collapse collapse">
	    <?
  	
	$sql3 = "SELECT PROVEEDOR,PRODUCTO,PERSONAL,OBRA,BODEGA,INFORMEYGRAFICO,ADMINISTRACION from permiso WHERE CODIGOPERMISO= $CODIGO ";
	conectar();
	$rs=mysql_query($sql3,$conexion);	
	while ($row4=mysql_fetch_array($rs)){
	
	  
  ?>
	    <div class="sidebar-toggler hidden-phone"></div>
	    <ul>
	      <li class=" "> <a href="../inicio.php"> <i class="icon-home"></i> <span class="title ">Inicio</span> <span class="arrow "></span></a></li>
	      <li class=""> <a href="../Calendario/calendario.php"> <i class="icon-calendar"></i> <span class="title">Calendario</span> <span class="arrow "></span></a></li>
	      <? if($row4["PROVEEDOR"]==1){
		?>
	      <li class="has-sub star active"> <a href="javascript:;"> <i class="icon-user "></i> <span class="title" >Proveedor</span> <span class="arrow "></span></a>
	        <ul class="sub">
	          <li ><a href="../Proveedor/add_proveedor.php">Agregar Proveedor</a></li>
	          <li ><a href="../Proveedor/mod_proveedor.php">Buscar</a></li>
            </ul>
          </li>
	      <? }
	
		if($row4["PRODUCTO"]==1){
		?>
	      <li class="has-sub "> <a href="javascript:;"> <i class="icon-book"></i> <span class="title">Producto</span> <span class="arrow"></span></a>
	        <ul class="sub">
	          <li ><a href="../Herramienta/mod_herramienta.php">Herramienta</a></li>
	          <li ><a href="../Insumo/mod_insumo.php">Insumo</a></li>
	          <li ><a href="../Ropa/mod_ropa.php">Ropa</a></li>
	          <li ><a href="../Vehiculo/mod_vehiculo.php">Vehiculo</a></li>
            </ul>
          </li>
	      <? }
	
		if($row4["PERSONAL"]==1){
		?>
	      <li class="has-sub"> <a href="javascript:;"> <i class="icon-group"></i> <span class="title">Personal</span> <span class="arrow "></span></a>
	        <ul class="sub">
	          <li ><a href="../Trabajador/add_trabajador.php">Agregar Trabajadores</a></li>
	          <li ><a href="../Cargo/add_cargo.php">Agregar cargo</a></li>
	          <li ><a href="../Trabajador/mod_trabajador.php">Buscar Trabajador</a></li>
	          <li ><a href="../Cargo/mod_cargo.php">Buscar Cargo</a></li>
	          <li ><a href="../Trabajador/termino_contrato.php">Termino Contrato</a></li>
            </ul>
          </li>
	      <? }
	
		 if($row4["OBRA"]==1){
		?>
	      <li class="has-sub "> <a href="javascript:;"> <i class="icon-map-marker"></i> <span class="title">Obra</span> <span class="arrow "></span></a>
	        <ul class="sub">
	          <li  ><a href="../Obra/add_obra.php">Agregar obra</a></li>
	          <li  ><a href="../Obra/mod_obra.php">Buscar</a></li>
	          <li ><a href="../Obra/cerrar_obra.php">Cerrar Obra</a></li>
            </ul>
          </li>
	      <? }
	
	      if($row4["BODEGA"]==1){
		?>
	      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-bar-chart"></i> <span class="title">Bodega</span> <span class="arrow "></span></a>
	        <ul class="sub">
	          <li ><a href="../Prestamo/prestamo.php">Prestamo</a></li>
	          <li ><a href="../Devolucion/devolucion.php">Devolucion</a></li>
	          <li ><a href="../Mantencion/mantencion.php">Mantencion</a></li>
	          <li ><a href="../Ficha_Trabajador/prestamo.php">Ficha Trabajador</a></li>
	          <li ><a href="../Bajo_stock/baja_stock.php">Bajo de Stock</a></li>
	          <li ><a href="../Baja_producto/baja_producto.php">Dar de baja Producto</a></li>
	          <li ><a href="../ingreso_producto/ingreso_producto.php">Ingreso de Producto</a></li>
            </ul>
          </li>
	      <? }
	
	      if($row4["INFORMEYGRAFICO"]==1){
		?>
	      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-search"></i> <span class="title">informes y Graficos</span> <span class="arrow "></span></a>
	        <ul class="sub">
	          <li ><a href="../graficos/menu_graficos.php">Graficos</a></li>
	          <li ><a href="../listados/menu_listados.php">Informes</a></li>
            </ul>
          </li>
	      <? }
	
 if($row4["ADMINISTRACION"]==1){
		?>
	      <li class="has-sub  "> <a href="javascript:;"> <i class="icon-warning-sign"></i> <span class="title">Administracion</span> <span class="arrow "></span></a>
	        <ul class="sub">
	          <li ><a href="../Usuario/add_usuario.php">Agregar Usuario</a></li>
	          <li ><a href="../Usuario/mod_usuario.php">Buscar Usuario</a></li>
	          <li ><a href="../Modificar_producto/mod_ingresoProducto.php">Modificar ingreso Produccto</a></li>
	          <li ><a href="#">Eliminar</a></li>
	          <li ><a href="../RespaldoBD/GenerarBD.php">Respalda base de datos</a></li>
            </ul>
          </li>
	      <? }
	}
		 ?>
	      <li class=""> <a href="../logout.php"> <i class="icon-user"></i> <span class="title">Cerrar seccion</span></a></li>
        </ul>
  </div>
<!-- -->

     <div id="body">
        <div class="container-fluid">
            <div class="row-fluid">
               <div class="span12">
                  <h3 class="page-title">Proveedor</h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="../inicio.php">Incio</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li>
                        <a href="#">Proveedor</a>
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="../Proveedor/add_proveedor.php">Agregar Proveedor</a></li>
                  </ul>

               </div>
            </div>
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box green">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Agredar Proveedor</h4>
                     </div>
                     <div class="widget-body form">
                        <h3>Datos del Proveedor</h3>
                        <form action="" method="post" id="form2" name="form2"  class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Rut</label>
                              <div class="controls">
                              
                                 <input type="text"  name="RUT" id="RUT" class="span6 " placeholder="Ingrese RUT" maxlength="12" required/> <button type="button" class="btn btn-info" onClick="validar_proveedor()">Verificar</button>
                              </div>
                           </div>
                           <div class="control-group">
                           <label class="control-label">Nombre</label>
                              <div class="controls">
                               <div class="input-icon left">
                              <i class=" icon-user"></i>
                                 <input  type="text" class="span6 style :text-transform: lowercase " name="NOMBRE" id="NOMBRE" placeholder="Nombre" disabled="disabled" required />
                              </div>
                           </div>
                           </div>
                          <div class="control-group">
                              <label class="control-label">Direccion</label>
                              <div class="controls">
                              <div class="input-icon left">
                              <i class=" icon-home"></i>
                                 <input type="text" name="DIRECCION" id="DIRECCION" class="span6" placeholder="Dirección" disabled="disabled" required/></div>
                              </div>
                          </div>
                        <div class="control-group">
                              <label class="control-label">Telefono</label>
                              <div class="controls">
                              <div class="input-icon left">
                              <i class=" icon-phone"></i>
                                  <input type="number" name="TELEFONO" id="TELEFONO"  class="span6" data-trigger="hover" placeholder="Telefono" min="0" disabled="disabled" required/>
                              </div>
                          </div>
                          </div>
                          
                           <div class="control-group">
                              <label class="control-label">Email</label>
                              <div class="controls">
                              <div class="input-icon left">
                              <i class="icon-envelope"></i>
                                  <input type="email" name="EMAIL" id="EMAIL"  class="m-wrap span6" data-trigger="hover" placeholder="Email" disabled="disabled" required/></div>
                              </div>
                           </div>
                           <div class="control-group">
                             <div class="controls chzn-controls"></div>
                          </div>
                           <div class="form-actions">
                             <input type="Submit" name="enviar" value="Guardar" class="btn btn-success"></input>
                              <button type="button" name="reset" class="btn" onClick="setear_form(2,2)">Cancelar</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>       
         </div>
      </div>
   </div>
<div id="footer">
      Bureau Veritas|Cesmec S.C.G.B desarrollado por Daniel Jara,Rodrigo Muñoz.
</div>

<script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>    
<script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  
<script src="../assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>  
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/plugins/jquery.blockui.js" type="text/javascript"></script>  
<script src="../assets/plugins/jquery.cookie.js" type="text/javascript"></script>
<script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> 
<script type="text/javascript" src="../assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script src="../assets/scripts/app.js"></script>
<script type="text/javascript" src="../js_mantenedores/validarut.js"></script>
<script type="text/javascript" src="../js_mantenedores/jquery.msgbox.min.js"></script>
   
<script>
var saber=0;
      jQuery(document).ready(function() { 
	     
		 App.init();	
		 
	   $("#form2").submit(function(e){ 
           RUT= $('#RUT').val()
		   NOMBRE= $('#NOMBRE').val()
           DIRECCION= $('#DIRECCION').val() 
		   TELEFONO= $('#TELEFONO').val()
		   EMAIL= $('#EMAIL').val()         
            e.preventDefault();//Detenemos submit
			if(saber==1){
            $.ajax({
                type: 'POST',
                url: 'guardar_proveedor.php',
                data: { RUT:RUT,NOMBRE: NOMBRE, DIRECCION: DIRECCION, TELEFONO:TELEFONO, EMAIL:EMAIL},
                success: function(data){
			      if(data==""){
			        $.msgbox("Proveedor Agregado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});
			        setear_form(2,2);
			       }
			        else {$.msgbox("Error 1053, a ocurrido un error al momento de ingresar los datos, por favor verifique los datos ó comuniquese con el administrador del sistema.", {type: "error",buttons : [{type: "submit", value: "Aceptar"}]});}
			   } 
            });
			}
			else if(saber==2){
				      $.ajax({
                      type: 'POST',
                      url: 'actualizar_proveedor.php',
                      data: { RUT:RUT,NOMBRE: NOMBRE, DIRECCION: DIRECCION, TELEFONO:TELEFONO, EMAIL:EMAIL},
                      success: function(data){
			          if(data==""){
			          $.msgbox("Proveedor Agregado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});
			          setear_form(2,2);
			          }
			            else {$.msgbox("Error 1053, a ocurrido un error al momento de ingresar los datos, por favor verifique los datos ó comuniquese con el administrador del sistema.", {type: "error",buttons : [{type: "submit", value: "Aceptar"}]});}
			       } 
                 });
				
				}
        });
		
      });
	  
	  
	  function validar_proveedor(){
			rut=$('#RUT').val();
			if(Rut(rut)==true){
				   rut=$('#RUT').val();
				   buscarTrabajador(rut);
				}
			 else {
				  $.msgbox("El valor ingresado no corresponde a un R.U.T valido, Por favor vefique el R.U.T. ingresado",{buttons : [{type: "submit", value: "Aceptar"}]});	
				  setear_form(2,1);
				 }
			 }
			 
			 function buscarTrabajador(rut) {
                   $.getJSON("buscar_proveedor.php", {rut: rut}, function(data) { 
                    if(data==1){
					    setear_form(1,1);
						saber=1;
						}
					else if(data==2){
						   $.msgbox("El Proveedor se Encuentra Activo, Por Favor verifique la lista de Proveedores",{buttons : [{type: "submit", value: "Aceptar"}]});
						   setear_form(2,1);
						   saber=0;
						}
					 else {recuperarProveedor(rut);}
                })
               }
			   
		function recuperarProveedor(id) {
                   $.getJSON("obtProveedorId.php", {id_proveedor: id}, function(data) {
                    $("#RUT").val(data[0].RUT)
                    $("#NOMBRE").val(data[0].NOMBRE)
                    $("#DIRECCION").val(data[0].DIRECCION)
					$("#TELEFONO").val(data[0].TELEFONO)
					$("#EMAIL").val(data[0].EMAIL)
					setear_form(1,0);
					saber=2;
                    
                })
               }
			
			function setear_form(numero,limpiar){
				 
				 if(numero==1){
					document.getElementById('RUT').disabled = true;
					document.getElementById('NOMBRE').disabled = false;
					document.getElementById('DIRECCION').disabled = false;
					document.getElementById('TELEFONO').disabled = false;
					document.getElementById('EMAIL').disabled = false;
					 }
				   else if(numero==2){
					     document.getElementById('RUT').disabled = false;
				         document.getElementById('NOMBRE').disabled = true;
				         document.getElementById('DIRECCION').disabled = true;
				         document.getElementById('TELEFONO').disabled = true;
				         document.getElementById('EMAIL').disabled = true;
					   }
				  if(limpiar==1){
					    $('#NOMBRE').val("");
				        $('#DIRECCION').val("");
				        $('#TELEFONO').val("");
						$('#EMAIL').val("");
					  } else if(limpiar==2){
						  $('#RUT').val("");
						  $('#NOMBRE').val("");
				          $('#DIRECCION').val("");
				          $('#TELEFONO').val("");
						  $('#EMAIL').val("");
						  }
				
				}
	  
   </script>            
</body>
</html>