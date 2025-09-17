<?PHP
header("Content-Type: text/html;charset=utf-8");
setlocale(LC_TIME, 'es_VE');
date_default_timezone_set('America/Caracas');
include("../conexion/conexionsqlsrv.php");
include("../validacion/validacion_general2.php");
include('../restringir/restringir.ini.php');
session_valida();
$conn = conectate();
$ano = date("Y");
$ano_menos = ($ano - 1);

$id_operacion = 0;
if(isset($_POST['id_operacion'])){
	$id_operacion = $_POST['id_operacion'];}

$txt_descripcion = "";
if(isset($_POST['txt_descripcion'])){
	$txt_descripcion = $_POST['txt_descripcion'];}	
	

$cbo_aplica_compras = 0;
if(isset($_POST['cbo_aplica_compras'])){
	$cbo_aplica_compras = $_POST['cbo_aplica_compras'];}


$cbo_aplica_ventas = 0;
if(isset($_POST['cbo_aplica_ventas'])){
	$cbo_aplica_ventas = $_POST['cbo_aplica_ventas'];}
	
	
$cbo_aplica_cxc = 0;
if(isset($_POST['cbo_aplica_cxc'])){
	$cbo_aplica_cxc = $_POST['cbo_aplica_cxc'];}
	
	
$cbo_aplica_cxp = 0;
if(isset($_POST['cbo_aplica_cxp'])){
	$cbo_aplica_cxp = $_POST['cbo_aplica_cxp'];}


$cbo_status = 2;
if(isset($_POST['cbo_status'])){
	$cbo_status = $_POST['cbo_status'];}
	
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
	<meta http-equiv="Content-type" content="text/html"; charset="UTF-8"/>
	<meta http-equiv="content-type" content="text/html"; charset="ISO-8859-1"/>
	<meta http-equiv="Content-Type" content="text/html;" charset="utf-8"/>
    
	
    <!-- Required meta tags -->
    <meta charset="utf-8">	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="Pragma"  content="no-cache" />
    <!-- Bootstrap core CSS -->

<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../validacion/validacion_general.js"></script>
<link rel="stylesheet" type="text/css" href="../css/general.css">
<style type="text/css">
<!--

-->
</style>
</head>

<body>

<div id="div_alerta"></div>

	<div id="divProceso" class="cCargando" style="visibility: hidden;"></div>
		<div id="div_carga">
			<img id="cargador" src="../imagenes/GIF/loading2.gif"/>
		</div>

<div id="1"> <!-- inicio -->	
 
	 <div id="div_totulo" style="background:#EAEAEA; padding:15px;" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<h4 id="titulo_pantalla" class="text-light"><strong>Operaciones</strong></h4>
		<span style="text-align:right;" class="contorno fa fa-book fa-2x text-light"></span>
	 </div>	<!-- fin div_totulo -->	 	  

    	<section> 	
         <div id="id_container1" class="container border border-info" style="padding:15px;">
            <div id="2" class="form-row">
              <div id="3" class="col-1 input-group-sm">
                  <label for="txt_id_bd">Codigo</label>
                  <input name="id_operacion"   type="text" disabled = "disabled" class="form-control form-control-sm"  id="id_operacion" onKeyPress="return solonumeros(event)" aria-label="Small" >
              </div>

                <div id="4" class="col-8 input-group-sm">
                    <label for="txt_nombre_bd">Descripción</label>              
                    <input name="txt_descripcion" type="text" class="form-control form-control-sm" id="txt_descripcion" maxlength="40"  aria-label="Small">              
                </div>


                <div id="5"  class="col-3 input-group-sm">
                  <label for="cbo_aplica_compras">Aplica en compras</label>
                  <select id="cbo_aplica_compras" class="form-control-sm custom-select" aria-label="Small" name="cbo_aplica_compras">
                    <option value="">--</option>
					<option value="0">No aplica - 0 </option>
                    <option value="1">Si aplica - 1</option>
                  </select>
                </div>	


                <div id="6"  class="col-3 input-group-sm">
                  <label for="cbo_aplica_ventas">Aplica en ventas</label>
                  <select id="cbo_aplica_ventas" class="form-control-sm custom-select" aria-label="Small" name="cbo_aplica_ventas">
                    <option value="">--</option>
					<option value="0">No aplica - 0 </option>
                    <option value="1">Si aplica - 1</option>
                  </select>
                </div>	

                <div id="7"  class="col-3 input-group-sm">
                  <label for="cbo_aplica_cxc">Aplica en Cuentas por cobrar</label>
                  <select id="cbo_aplica_cxc" class="form-control-sm custom-select" aria-label="Small" name="cbo_aplica_cxc">
                    <option value="">--</option>
					<option value="0">No aplica - 0 </option>
                    <option value="1">Si aplica - 1</option>
                  </select>
                </div>	

                <div id="8"  class="col-3 input-group-sm">
                  <label for="cbo_aplica_cxp">Aplica en Cuentas por pagar</label>
                  <select id="cbo_aplica_cxp" class="form-control-sm custom-select" aria-label="Small" name="cbo_aplica_cxp">
                    <option value="">--</option>
					<option value="0">No aplica - 0 </option>
                    <option value="1">Si aplica - 1</option>
                  </select>
                </div>

                <div id="12"  class="col-3 input-group-sm">
                  <label for="cbo_status">Status</label>
                  <select id="cbo_status" class="form-control-sm custom-select" aria-label="Small" name="cbo_status">
                    <option value="">--</option>
					<option value="0">Inactivo - 0 </option>
                    <option value="1">Activo - 1</option>
                  </select>
                </div>					
               
            </div>  
         </div><!-- fin id_container1 -->   
		      
      
        <div id="id_container2" class="container border border-info" style="padding:15px;">
            <div id="div_row" class="form-row">
                <div id="boton1" style="vertical-align:middle" class="col-2">                   
                     <button  id="btn_nuevo" type="button" data-toggle="modal" data-target="#myModal" class="boton boton1 btn btn-outline-dark ">Nuevo</button>   
                </div>
                
                <div id="8" class="w-100"></div>
            
                <div id="boton2" class="col-2">
                    <button id="btn_guardar"  type="button"  data-toggle="modal" data-target="#myModal" class="boton boton2 btn btn-outline-dark ">Guardar</button>   
                </div>                    
                
                <div id="9" class="w-100"></div>
                
                <div id="boton3" class="col-2">
                   <button id="btn_eliminar"  type="button"  data-toggle="modal" data-target="#myModal" class="boton boton3 btn btn-outline-dark ">Eliminar</button>       
                </div>                    
                
                <div id="10" class="w-100"></div>               
               
            </div>  
        </div><!-- fin id_container2 -->
       </section>
        
    <div id="id_container3" class="container-fluid border border-info" style="padding:15px;">

        <strong>Lista - Seleccione</strong>
        <table class="table table-sm table-bordered  table-hover" style="font-size:12px">
          
            <thead style="background:#3399CC;">
            <tr>
              <th class="contorno_gris_th tiulo_th" scope="col">Id</th>
              <th class="contorno_gris_th tiulo_th" scope="col">Descripción</th>
			  <th class="contorno_gris_th tiulo_th" scope="col">Aplica en compras</th>
			  <th class="contorno_gris_th tiulo_th" scope="col">Aplica en ventas</th>
			  <th class="contorno_gris_th tiulo_th" scope="col">Aplica en Cuentas_Cobrar</th>
			  <th class="contorno_gris_th tiulo_th" scope="col">Aplica en Cuentas_Pagar</th>			  
			  <th class="contorno_gris_th tiulo_th" scope="col">Status</th>
			  

            </tr>
          </thead>
		  
          <tbody>
				<?PHP 
				$qry = "[dbo].[SP_BUS_OPERACIONES] ".$id_operacion."";
				$rst = sqlsrv_query( $conn, $qry, array(), array("Scrollable"=>"buffered"));
				if (! $rst) {  
				   echo "Error en la ejecución de la instrucción ".$qry.".\n";
				   die( print_r2( sqlsrv_errors(), true));  
				   exit;
				}
				
				while( $rowusu = sqlsrv_fetch_array( $rst) ) 
				{
				?>				
				   <tr onClick="javascript:bus_datos('<?PHP echo $rowusu['id_operacion'];?>',
													 '<?PHP echo utf8_encode($rowusu['descripcion']);?>',
													 '<?PHP echo $rowusu['compras'];?>',
													 '<?PHP echo $rowusu['ventas'];?>',
													 '<?PHP echo $rowusu['cuentas_cobrar'];?>',
													 '<?PHP echo $rowusu['cuentas_pagar'];?>',
													 '<?PHP echo $rowusu['status'];?>'
													 )">
														
					  <th class="td_move" align="center" scope="row"><?PHP echo $rowusu['id_operacion'];?></th>
					  <td align="left"   class="td_move"><?PHP echo utf8_encode($rowusu['descripcion']);?></td>					  
					  <th class="td_move" align="center" scope="row"><?PHP echo $rowusu['compras'];?></th>
					  <th class="td_move" align="center" scope="row"><?PHP echo $rowusu['ventas'];?></th>
					  <th class="td_move" align="center" scope="row"><?PHP echo $rowusu['cuentas_cobrar'];?></th>
					  <th class="td_move" align="center" scope="row"><?PHP echo $rowusu['cuentas_pagar'];?></th>					  
					  <th class="td_move" align="center" scope="row"><?PHP echo $rowusu['status'];?></th>
					</tr>
				<?PHP
				}	  
				sqlsrv_free_stmt( $rst );  
				sqlsrv_close( $conn );
				?>
          </tbody>
        </table>        
    </div><!-- fin id_container3 -->    
    
    
</div> <!--  -->
</div>	<!-- fin inicio -->


<script>
			
function bus_datos(id,
                   descripcion,
				   aplica_compras,
				   aplica_ventas,
				   aplica_cxc,
				   aplica_cxp,
				   status)
{
	$("#id_operacion").val(id);
	$("#txt_descripcion").val(descripcion);
	$("#cbo_aplica_compras").val(aplica_compras);
	$("#cbo_aplica_ventas").val(aplica_ventas);
	$("#cbo_aplica_cxc").val(aplica_cxc);
	$("#cbo_aplica_cxp").val(aplica_cxp);
	$("#cbo_status").val(status);

	if(id > 0)
		desbloquea_caja();		

	$("#txt_descripcion").focus();		
}


function initControls()
{
	window.location.hash="red";
	window.location.hash="Red"; //chrome
	window.onhashchange=function(){window.location.hash="red";}
}


function eliminar(valor)
{
	//ajax que ELIMINA
	$.ajax({
	type: "POST",
	dataType:"html",
	url: "../datos/eli_operaciones.php",
	data:"txt_id_bd="+valor,				 
    beforeSend: function(){    	    
    },	
	cache: false,			
	success: function(result) {	
		//alert(result);
		if(result == 1){

			$('.modal-backdrop').hide();
			$("body").removeClass("modal-open");
			
			bloquea()
			toastr.success('Datos Eliminados con Exito !!!', "Mensaje !!!", {
			"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});
			setTimeout(function(){ desbloquea();}, 5000);			

			$("#contenedor").empty();
			$('#contenedor').load('../paginas/issg_operaciones.php');

			
		}else{
			toastr.error('Error Eliminando los datos en  la tabla < ISSG_OPERACIONES > !!!', "Error !!!", {
			"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});				
			return false;			
		}
	},	
	error: function(error) {				
		alert("Problemas con la pagina alm_base_dato ... comuniquese con el Personal de Sistemas !!!" + error);
		}		
	});

}

$(document).ready(function(){  

bloquea_caja();

$('#div_carga')
			.hide()
			.ajaxStart(function() {
				$(this).show();
			})
			.ajaxStop(function() {
				$(this).hide();
			});
	
	initControls();	
	$('#txt_descripcion').focus();
		
	//------------------------->
	//PROCESO DE GUARDADO	
	$('#btn_nuevo').on('click', function(){	
		
		desbloquea_caja();
		$("#id_operacion").val(0);	
		$("#txt_descripcion").val('');
		$("#cbo_aplica_compras").val('');
		$("#cbo_aplica_ventas").val('');
		$("#cbo_aplica_cxc").val('');
		$("#cbo_aplica_cxp").val('');
		$("#cbo_status").val('');
	
	});
	
	
	$('#btn_guardar').on('click', function(){	

		//inicio de validaciones		
		var id_operacion		= 	$("#id_operacion").val();
		var txt_descripcion		= 	$.trim($("#txt_descripcion").val());
		var cbo_aplica_compras	= 	$.trim($("#cbo_aplica_compras").val());
		var cbo_aplica_ventas	= 	$.trim($("#cbo_aplica_ventas").val());
		var cbo_aplica_cxc		= 	$.trim($("#cbo_aplica_cxc").val());
		var cbo_aplica_cxp		= 	$.trim($("#cbo_aplica_cxp").val());
		var cbo_status			= 	$.trim($("#cbo_status").val());

		if(id_operacion == '')
		{
			 bloquea();
			 toastr.error("Error debe  -- <b> Selecionar un Codigo o tocar el Boton Nuevo <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});			
			setTimeout(function(){ desbloquea();}, 2000);				
			return false;	
		}
		
		if(txt_descripcion == '' ||  txt_descripcion.length < 5)
		{
			 bloquea();
			 toastr.error("Error en el Campo -- <b> DESCRIPCION <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_descripcion").focus();
			setTimeout(function(){ desbloquea();}, 2000);
			return false;	
		}
		
		if(cbo_aplica_compras == '')
		{
			 bloquea();
			 toastr.error("Error en el Campo -- <b> APLICA EN COMPRAS <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#cbo_aplica_compras").focus();
			setTimeout(function(){ desbloquea();}, 2000);
			return false;	
		}
		
		
		if(cbo_aplica_ventas == '')
		{
			 bloquea();
			 toastr.error("Error en el Campo -- <b> APLICA EN VENTAS <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_descripcion").focus();
			setTimeout(function(){ desbloquea();}, 2000);
			return false;	
		}
		
		
		if(cbo_aplica_cxc == '')
		{
			 bloquea();
			 toastr.error("Error en el Campo -- <b> APLICA EN CUENTAS POR COBRAR <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#cbo_aplica_cxc").focus();
			setTimeout(function(){ desbloquea();}, 2000);
			return false;	
		}
		
		
		if(cbo_aplica_cxp == '')
		{
			 bloquea();
			 toastr.error("Error en el Campo -- <b> APLICA EN CUENTAS POR PAGAR <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#cbo_aplica_cxp").focus();
			setTimeout(function(){ desbloquea();}, 2000);
			return false;	
		}
		
		
		if(cbo_status == '')
		{
			 bloquea();
			 toastr.error("Error en el Campo -- <b> STATUS <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#cbo_status").focus();
			setTimeout(function(){ desbloquea();}, 2000);
			return false;	
		}
		
		
			//ajax que guarda y modifica
			$.ajax({
			type: "POST",
			dataType:"html",
			url: "../datos/alm_operaciones.php",
			data:"id_operacion="+$("#id_operacion").val()+
			 "&txt_descripcion="+$("#txt_descripcion").val(),
			 "&cbo_aplica_compras="+$("#cbo_aplica_compras").val(),
			 "&cbo_aplica_ventas="+$("#cbo_aplica_ventas").val(),
			 "&cbo_aplica_cxc="+$("#cbo_aplica_cxc").val(),
			 "&cbo_aplica_cxp="+$("#cbo_aplica_cxp").val(),
			 "&cbo_status="+$("#cbo_status").val(),
			cache: false,			
			success: function(result) {	
			resultado=result.split("/");
			//alert(result);
			
				if(resultado[0] == 1){						
					bloquea();
					toastr.success('Datos Almacenados con Exito !!!', "Mensaje !!!", {
					"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});				
					setTimeout(function(){ desbloquea();}, 5000);

					$("#contenedor").empty();
					$('#contenedor').load('../paginas/issg_operaciones.php');
				
				}else if(resultado[0] == 2){

					bloquea()
					toastr.success('Numero de cuenta Contable Existente !!! para el codigo < '+ resultado[1] +' >', "Mensaje !!!", {
					"showDuration": "150","hideDuration": "1500","timeOut": "4000","extendedTimeOut": "2000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});				
					setTimeout(function(){ desbloquea();}, 10000);

					$("#contenedor").empty();
					$('#contenedor').load('../paginas/issg_operaciones.php');
				
				}else{
					toastr.error('Error Insertando los datos en la tabla < Operaciones > !!!', "Error !!!", {
					"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"        		});	
					$("#txt_password").focus();
					return false;			
				}		
			},			
			error: function(error) {				
				alert("Problemas con la pagina ALM_OPERACIONES ... comuniquese con el Personal de Sistemas !!!" + error);
				}		
			});	

	});		
		
	$('#btn_eliminar').on('click', function(){
		var valor;
		valor = $('#id_operacion').val();
		if(valor == 0)	
		{
			bloquea();
			toastr.error('Error Debe Seleccionar un  < CODIGO > !!!', "Error !!!", {
				"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"
			});
			setTimeout(function(){ desbloquea();}, 2000);	
			return false;		
		}else{				
			$("#div_alerta").prepend(ventana_modal(valor,'ELIMINAR','Desea realmente eliminar este Registro ??? <'+ valor + '>','ELIMINAR',2));					

				$('#btn_modal_aceptar').on('click', function(){
					eliminar(valor);
				});	
			
		}	
	});		


    $(".td_move").click(function(evento){    
	   $("html,body").animate({scrollTop:0}, "slow");
    });

}); // fin ready

function bloquea()
{
	document.getElementById("divProceso").style.visibility = "visible";
	$('#div_carga').show();		
}

function desbloquea()
{
	document.getElementById("divProceso").style.visibility = "hidden";
	$('#div_carga').hide();		
}

function bloquea_caja()
{
	$('#id_operacion').attr('disabled','0');	
	$('#txt_descripcion').attr('disabled','0');	
	$('#cbo_aplica_compras').attr('disabled','0');
	$('#cbo_aplica_ventas').attr('disabled','0');
	$('#cbo_aplica_cxc').attr('disabled','0');
	$('#cbo_aplica_cxp').attr('disabled','0');	
	$('#cbo_status').attr('disabled','0');

}

function desbloquea_caja()
{
	$('#txt_descripcion').attr('disabled',false);	
	$('#cbo_aplica_compras').attr('disabled',false);
	$('#cbo_aplica_ventas').attr('disabled',false);
	$('#cbo_aplica_cxc').attr('disabled',false);
	$('#cbo_aplica_cxp').attr('disabled',false);	
	$('#cbo_status').attr('disabled',false);

}

function desbloquea_caja_nuevo()
{
	$('#txt_descripcion').attr('disabled',false);
	$('#cbo_aplica_compras').attr('disabled',false);
	$('#cbo_aplica_ventas').attr('disabled',false);
	$('#cbo_aplica_cxc').attr('disabled',false);
	$('#cbo_aplica_cxp').attr('disabled',false);
	$('#cbo_status').attr('disabled',false);

}
</script>
</body>
</html>