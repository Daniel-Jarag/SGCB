<?php  session_start();
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
   <link rel="stylesheet" type="text/css" href="../css_mantenedoressd/jquery.msgbox.css" />
   <link href="../assets/plugins/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link rel="stylesheet" href="../assets/plugins/fancybox/source/jquery.fancybox.css"/>
    
</head> 

<body class="fixed-top">

<div id="header" class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
         	<!-- BEGIN LOGO -->
				<a class="brand" href="../inicio.php">
				<img src="../assets/img/logo.png" alt="Conquer" />
				</a>
				<!-- END LOGO -->
         
         <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
           <span class="icon-bar"></span> 
           <span class="icon-bar"></span> 
           <span class="arrow"></span> </a>
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
                  </span> </a>
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
                        </span> en Bodega. </a> </li>
                      <?
						}?>
                      <li> <a href="#">Ver todas las notificaciones</a> </li>
                    </ul>
                </li>
                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <b class="caret"></b> </a>
                    <ul class="dropdown-menu">
                      <li><a href="../calendario/calendario.php"><i class="icon-calendar"></i> Calendario</a></li>
                      <li class="divider"></li>
                      <li>        
                      <a href="#"><i class="icon-user"> </i>
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
      <li class="star active"> <a href="../Calendario/calendario.php"> <i class="icon-calendar"></i> <span class="title">Calendario</span> <span class="arrow "></span></a></li>
      <? if($row4["PROVEEDOR"]==1){
		?>
      <li class="has-sub "> <a href="javascript:;"> <i class="icon-user "></i> <span class="title" >Proveedor</span> <span class="arrow "></span></a>
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
          <li ><a href="../Ingreso_producto/ingreso_producto.php">Ingreso de Producto</a></li>
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
<div id="body">
     <div class="container-fluid">     
            <div class="row-fluid">
               <div class="span12">
                  <h3 class="page-title">
                     Calendario
                  </h3>
                  <ul class="breadcrumb">
                     <li>
                        <i class="icon-home"></i>
                        <a href="../inicio.php">Home</a> 
                        <i class="icon-angle-right"></i>
                     </li>
                     <li><a href="../calendario.php">Calendario</a></li>
                  </ul>
               </div>
            </div>
            <div id="page">
               <div class="row-fluid">
                  <div class="span12">
                     <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i>Calendario</h4>
                        </div>
                        <div class="widget-body">
                           <div class="row-fluid">
                              <div class="span3 responsive" data-tablet="span12 fix-margin" data-desktop="span8">   
                                 <h3 class="event-form-title">Ingreso de Eventos</h3>
                                 <div id="external-events">    
                                    <form class="inline-form" id="form2" name="form2">
                                    <input type="hidden" name="USUARIO"  id="USUARIO" value=" <?php echo $_SESSION["USUARIO"];?> " />
                                      <label>Titulo</label><input type="text" value="" class="span12" placeholder="Ingrese un titulo" id="TITULO" required/><br />
                                       <label>Descripcion</label><textarea name="DESCRIPCION" class="span12" id="DESCRIPCION" maxlength="200" placeholder="Descripción" cols="0" required></textarea><br />
                                        <label>Fecha </label><input type="date" value="" class="span12" id="FECHA" required/><br />
                                           <label>Prioridad</label>
                                           <select id="PRIORIDAD" class="span12 chosen">
                                          <option value="default">Normal</option>
                                          <option value="important">Importante</option>
                                       </select>
                                       <div class="space12"></div>
                                       <button type="submit" class="btn btn-info">Ingresar</button>
                                    </form>
                                    
                                    <hr />
                                    <div id="event_box">
                                    </div>
                                    <label for="drop-remove" class="span9" >
                                    <input type="checkbox" id="OBRA" checked onClick="check_obra()" /><span class="label label-success">Obra</span>                        
                                    </label><br />
                                    <label for="drop-remove" class="span10">
                                    <input type="checkbox" id="ARRIENDO" checked onClick="check_arriendo()" /><span class="label label-warning">Arriendo</span>                         
                                    </label><br />
                                    <label for="drop-remove" class="span10">
                                    <input type="checkbox" id="TRABAJADOR" checked onClick="check_trabajador()" /><span class="label label-info">Trabajador</span>                         
                                    </label><br />
                                    <label for="drop-remove" class="span10">
                                    <input type="checkbox" id="GENERAL" checked onClick="check_general()" /><span class="label label-default">Eventos Generales</span>                         
                                    </label><br />
                                    <label for="drop-remove" class="span10">
                                    <input type="checkbox" id="IMPORTANTE" checked onClick="check_importante()" /><span class="label label-important">Eventos Importantes</span>                         
                                    </label><br />
                                    <hr class="visible-phone"/>
                                 </div>            
                              </div>
                              <div class="span9">
                                 <div id="calendar" class="has-toolbar"></div>
                              </div>
                              <div id="form">
                              <!-- ----------------------------------------------------------------------------------------------   -->    
                <a id='btnFancybox'style="display: none;" href='#editarFormulario'>Cargar Fancy</a> 
                       
                 <div style="display: none;" id='editarFormulario'>
                        <h3>Datos del Evento</h3>  
                        <form action="" method="post" id="form1" name="form1"  class="form-horizontal">
                        <input type="hidden" name="CODIGO" id="CODIGO" />  	
                           <div class="control-group">
                              <label class="control-label">Titulo</label>
                              <div class="controls">
                                 <input type="text"  name="TITULO_FORM" id="TITULO_FORM" class="span6" data-trigger="hover"  required />
                              </div>
                           </div>
                           <div class="control-group">
                           <label class="control-label">Descripción</label>
                              <div class="controls">
                                <textarea name="DESCRIPCION" class="span6" id="DESCRIPCION_FORM" maxlength="200" cols="0" required ></textarea>
                              </div>
                             </div>
                             
                             <div class="control-group">
                           <label class="control-label">Prioridad</label>
                              <div class="controls">
                                <select id="PRIORIDAD_FORM" name="PRIORIDAD_FORM" class="span6 chosen">
                                          <option value="default">Normal</option>
                                          <option value="important">Importante</option>
                                 </select>
                              </div>
                             </div>
                              
                          <div class="control-group">
                            <div class="controls chzn-controls"></div>
                          </div>
                           <div class="form-actions">
                             <input type="Submit" name="enviar" value="Guardar" class="btn btn-success"></button>
                             <button type="button" name="CANCELAR" class="btn" onClick="$.fancybox.close();">Cancelar</button>
                           </div>
                        </form>
           </div>
 <!-- ----------------------------------------------------------------------------------------------  ---------------------------------------- --> 
                              
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>   
   </div>
   <div id="footer">
      Bureau Veritas|Cesmec S.C.G.B desarrollado por Daniel jara,Rodrigo muñoz.
</div>
   
   <script src="../assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>    
   <script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
   <script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  
   <script src="../assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>  
   <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="../assets/plugins/jquery.blockui.js" type="text/javascript"></script>  
   <script src="../assets/plugins/jquery.cookie.js" type="text/javascript"></script>
   <script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> 
   <script src="../assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="../assets/scripts/app.js"></script>
   <script src="jsCalendario.js"></script> 
   <script type="text/javascript" src="../js_mantenedores/jquery.msgbox.min.js"></script>
   <script type="text/javascript" src="../js_mantenedores/jquery.fancybox.js"></script>
      
   <script>
   var jsonObra,jsonArriendo,jsonTrabajadorIngreso,jsonTrabajadorDesvinculacion,jsonCalendarioGeneral,jsonCalendarioImportante
      jQuery(document).ready(function() {       
         App.init();
		 Componente.init();
		 $("#btnFancybox").fancybox();
		 $("#form2").submit(function(e){
			 TITULO=$('#TITULO').val()
		     PRIORIDAD=$('#PRIORIDAD').val()
		     DESCRIPCION=$('#DESCRIPCION').val()
		     FECHA=$('#FECHA').val()
			 LABEL='label label-'+PRIORIDAD
			 USUARIO=$("#USUARIO").val();
	         e.preventDefault();//Detenemos submit
			     $.ajax({
                 type: 'POST',
                 url: 'guardar_calendario.php',
                 data: { TITULO:TITULO, DESCRIPCION: DESCRIPCION, FECHA:FECHA, LABEL:LABEL,USUARIO:USUARIO},
                 success: function(data){
			     if(data==""){
			        $.msgbox("Evento Agregado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});
					limpiar();
					cal.fullCalendar('removeEventSource', jsonCalendarioImportante)
					cal.fullCalendar('removeEventSource', jsonCalendarioGeneral)
                    if($("#GENERAL").is(':checked')) {cal.fullCalendar('addEventSource', jsonCalendarioGeneral)}
					if($("#IMPORTANTE").is(':checked')) {cal.fullCalendar('addEventSource', jsonCalendarioImportante)}
					}
				 else {$.msgbox("Error 1053, a ocurrido un error al momento de ingresar los datos, por favor verifique los datos ó comuniquese con el administrador del sistema.", {type: "error",buttons : [{type: "submit", value: "Aceptar"}]});}
			     }
			 });
		  });
		
		 $("#form1").submit(function(e){
			 CODIGO=$('#CODIGO').val()
			 TITULOF=$('#TITULO_FORM').val()
		     PRIORIDADF=$('#PRIORIDAD_FORM').val()
		     DESCRIPCIONF=$('#DESCRIPCION_FORM').val()
			 LABELF='label label-'+PRIORIDADF
			 USUARIOF=$("#USUARIO").val();
			 $.fancybox.close();
	         e.preventDefault();//Detenemos submit
		      $.ajax({
                 type: 'POST',
                 url: 'modifica_evento.php',
                 data: { CODIGO:CODIGO, TITULO:TITULOF, DESCRIPCION:DESCRIPCIONF, LABEL:LABELF, USUARIO:USUARIOF},
                 success: function(data){
			     if(data==""){
			        $.msgbox("Evento Modificado Exitosamente",{type: "info",buttons : [{type: "submit", value: "Aceptar"}]});
					limpiar_form();
					cal.fullCalendar('removeEventSource', jsonCalendarioImportante)
					cal.fullCalendar('removeEventSource', jsonCalendarioGeneral)
					if($("#GENERAL").is(':checked')) {cal.fullCalendar('addEventSource', jsonCalendarioGeneral)}
					if($("#IMPORTANTE").is(':checked')) {cal.fullCalendar('addEventSource', jsonCalendarioImportante)}
					}
				 else {$.msgbox("Error 1053, a ocurrido un error al momento de ingresar los datos, por favor verifique los datos ó comuniquese con el administrador del sistema.", {type: "error",buttons : [{type: "submit", value: "Aceptar"}]});}
			     }
			 });
		  });   	     	  
      });
	  
	   function check_obra() {
		 if($("#OBRA").is(':checked')) {cal.fullCalendar('addEventSource', jsonObra)}
		  else {cal.fullCalendar('removeEventSource', jsonObra)}
	   }
	   function check_arriendo() {
		 if($("#ARRIENDO").is(':checked')) {cal.fullCalendar('addEventSource', jsonArriendo)}
		  else {cal.fullCalendar('removeEventSource', jsonArriendo)}
	   }
	   function check_trabajador() {
		 if($("#TRABAJADOR").is(':checked')) {cal.fullCalendar('addEventSource', jsonTrabajadorIngreso);cal.fullCalendar('addEventSource', jsonTrabajadorDesvinculacion)}
		  else {cal.fullCalendar('removeEventSource', jsonTrabajadorIngreso);cal.fullCalendar('removeEventSource', jsonTrabajadorDesvinculacion)}
	   }
	   function check_general() {
		 if($("#GENERAL").is(':checked')) {cal.fullCalendar('addEventSource', jsonCalendarioGeneral)}
		  else {cal.fullCalendar('removeEventSource', jsonCalendarioGeneral)}
	   }
	   function check_importante() {
		 if($("#IMPORTANTE").is(':checked')) {cal.fullCalendar('addEventSource', jsonCalendarioImportante)}
		  else {cal.fullCalendar('removeEventSource', jsonCalendarioImportante)}
	   }
	   function limpiar(){
		    $('#TITULO').val("")
			$('#PRIORIDAD').val("default")
			$('#DESCRIPCION').val("")
			$('#FECHA').val("")
		   }
	   function limpiar_form(){
			$('#CODIGO').val("")
		    $('#TITULO_FORM').val("")
			$('#PRIORIDAD_FORM').val("default")
			$('#DESCRIPCION_FORM').val("")
		   }
	    function buscarEvento(ID){
			$.getJSON("buscar_evento.php", {ID:ID}, function(data) {
			$("#CODIGO").val(data[0].CODIGO)
			$("#TITULO_FORM").val(data[0].TITULO)
			$("#DESCRIPCION_FORM").val(data[0].DESCRIPCION)
			if(data[0].CLASS=="label label-important"){$("#PRIORIDAD_FORM").val("important");}else{$("#PRIORIDAD_FORM").val("default");}
            $("#btnFancybox").click()
			  })
			}
   </script>
</body>
</html>
