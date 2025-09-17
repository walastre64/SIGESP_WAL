<?PHP
header("Content-Type: text/html;charset=utf-8");
setlocale(LC_TIME, 'es_VE');
date_default_timezone_set('America/Caracas');
include("../conexion/conexionsqlsrv.php");
include("../validacion/validacion_general2.php");
include('../restringir/restringir.ini.php');
session_valida();
$conn = conectate();

$usuario = $_SESSION['cedula'];

$txt_id_ins_pgo = 0;
if(isset($_POST['txt_id_ins_pgo'])){
	$txt_id_ins_pgo = $_POST['txt_id_ins_pgo'];}

$txt_codigo = '';
if(isset($_POST['txt_codigo'])){
	$txt_codigo = $_POST['txt_codigo'];}
	
$txt_descrip = '';
if(isset($_POST['txt_descrip'])){
	$txt_descrip = $_POST['txt_descrip'];}
	
$cbo_id_cuentas_bancarias = 0;
if(isset($_POST['cbo_id_cuentas_bancarias'])){
	$cbo_id_cuentas_bancarias = $_POST['cbo_id_cuentas_bancarias'];}
	
$cbo_id_ipgo_tipos = 0;
if(isset($_POST['cbo_id_ipgo_tipos'])){
	$cbo_id_ipgo_tipos = $_POST['cbo_id_ipgo_tipos'];}		

$cbo_status  = 2; // VALOR > 2 EN LA BD PARA ENCONTRARLOS TODOS
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

<div id="1"> <!-- inicio -->		

<div id="div_alerta"></div>

	<div id="divProceso" class="cCargando" style="visibility: hidden;"></div>
		<div style="text-align: center;" id="div_carga">
			<img id="cargador" src="../imagenes/GIF/loading2.gif"/>
		</div>

<div id="1"> <!-- inicio -->	

 	<a name="ir"></a>
	 <div id="div_totulo" style="background:#EAEAEA; padding:15px;" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<!--<h3 class="h3 text-dark">Base de Datos </h3><span class="fa-twitter fa"></span> -->
		<h4 id="titulo_pantalla" class="text-light"><strong>Instrumentos de Pagos</strong></h4>
		<span style="text-align:right" class="contorno fa fa-check fa-2x text-light"></span>
	 </div>	<!-- fin div_totulo -->	 	  

    	<section> 	
         <div id="id_container1" class="container border border-info" style="padding:15px;">
            
			<div id="2" class="form-row">
            
			  <div id="3" class="col-1 input-group-sm">
                  <label for="txt_id_ins_pgo">Codigo</label>
                  <input name="txt_id_ins_pgo"   type="text" disabled = "disabled" class="form-control form-control-sm"  id="txt_id_ins_pgo" aria-label="Small" >
              </div>
			  
			  
 				<div id="6" class="col-8 input-group-sm">
                  <label for="cbo_id_cuentas_bancarias">Cuenta bancaria</label>
                  <select id="cbo_id_cuentas_bancarias" class="form-control-sm custom-select" aria-label="Small" name="cbo_id_cuentas_bancarias">
                    <option value="">--</option>
					<?PHP
					$qry = "SET ANSI_NULLS ON SET ANSI_WARNINGS ON EXEC [dbo].[SP_BUS_CUENTAS_BANCARIAS] 0,1";
					$rst = sqlsrv_query( $conn, $qry, array(), array("Scrollable"=>"buffered"));
					if (! $rst) {  
					   echo "Error en la ejecución de la instrucción ".$qry.".\n";
					   die( print_r2( sqlsrv_errors(), true));  
					   exit;
					}
						while( $rowcb = sqlsrv_fetch_array($rst)) { ?>
						<option value="<?PHP echo $rowcb[0];?>"><?PHP echo $rowcb[2].' - CTA_BANCARIA: '.$rowcb[10];?></option>
					<?PHP }?>

                  </select>
                </div>				

		    </div> <!-- fin id=2 --> 

			<div id="21" class="form-row">   
				<!--
				<div id="5" style="padding-top:10px;" class="col-10 input-group-sm">
					<label for="txt_descrip">Descripción</label>
					<input name="txt_descrip"   type="text"  class="form-control form-control-sm"  id="txt_descrip" maxlength="40" aria-label="Small" >
				</div>
				-->


				<div id="7" style="padding-top:10px;" class="col-6 input-group-sm">
                  <label for="cbo_id_ipgo_tipos">Tipo de instrumento</label>
                  <select id="cbo_id_ipgo_tipos" class="form-control-sm custom-select" aria-label="Small" name="cbo_id_ipgo_tipos">
                    <option value="">--</option>
					<?PHP
					$qry = "SET ANSI_NULLS ON SET ANSI_WARNINGS ON EXEC [dbo].[SP_BUS_INSTRUMENTOS_PAGOS_TIPOS] 0,1";
					$rst = sqlsrv_query( $conn, $qry, array(), array("Scrollable"=>"buffered"));
					if (! $rst) {  
					   echo "Error en la ejecución de la instrucción ".$qry.".\n";
					   die( print_r2( sqlsrv_errors(), true));  
					   exit;
					}
						while( $rowti = sqlsrv_fetch_array($rst)) { ?>
						<option value="<?PHP echo $rowti[0];?>"><?PHP echo $rowti[1];?></option>
					<?PHP }?>

                  </select>
                </div>				
              
          		<div id="8" style="padding-top:10px;"  class="col-3 input-group-sm">
                  <label for="cbo_status">Status</label>
                  <select id="cbo_status" class="form-control-sm custom-select" aria-label="Small" name="cbo_status">
                    <option value="">--</option>
					<option value="0">Inactivo - 0 </option>
                    <option value="1">Activo - 1</option>
                  </select>
                </div>	

			</div> <!-- fin id=21 --> 
			 
         </div><!-- fin id_container1 -->        
      
        <div id="id_container2" class="container border border-info" style="padding:15px;">
            <div id="div_row" class="form-row">
                <div id="boton1" style="vertical-align:middle" class="col-2">                   
                     <button  id="btn_nuevo" type="button" data-toggle="modal" data-target="#myModal" class="boton boton1 btn btn-outline-dark ">Nuevo</button>   
                </div>
                
                <div id="13" class="w-100"></div>
            
                <div id="boton2" class="col-2">
                    <button id="btn_guardar"  type="button"  data-toggle="modal" data-target="#myModal" class="boton boton2 btn btn-outline-dark ">Guardar</button>   
                </div>                    
                
                <div id="14" class="w-100"></div>
                
                <div id="boton3" class="col-2">
                   <button id="btn_eliminar"  type="button"  data-toggle="modal" data-target="#myModal" class="boton boton3 btn btn-outline-dark ">Eliminar</button>       
                </div>                    
                
                <div id="15" class="w-100"></div>
       
            </div>  
        </div><!-- fin id_container2 -->
       </section>
        
    <div id="id_container3" class="container-fluid border border-info" style="padding:15px;">

        <strong>Lista - Seleccione</strong>
        <table class="table table-sm table-bordered  table-hover" style="font-size:12px">
          
            <thead style="background:#3399CC;">
            <tr>
              <th class="contorno_gris_th tiulo_th" scope="col">Id</th>
              <th class="contorno_gris_th tiulo_th" scope="col">Cuenta bancaria</th>
			  <th class="contorno_gris_th tiulo_th" scope="col">Tipo de instrumento</th> 
			  <th class="contorno_gris_th tiulo_th" scope="col">Descripción</th>
			  <th class="contorno_gris_th tiulo_th" scope="col">Código Inst.</th>
			  <th class="contorno_gris_th tiulo_th" scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
				<?PHP 
				$qry = "[SP_BUS_INSTRUMENTOS_PAGOS] ".$txt_id_ins_pgo.",";
				$qry .= $cbo_id_cuentas_bancarias.",";
				$qry .= $cbo_id_ipgo_tipos.",";				
				$qry .= $cbo_status."";		

				$rst = sqlsrv_query( $conn, $qry, array(), array("Scrollable"=>"buffered"));
				if (! $rst) {  
				   echo "Error en la ejecución de la instrucción ".$qry.".\n";
				   die( print_r2( sqlsrv_errors(), true));  
				   exit;
				}
				
				while( $rowusu = sqlsrv_fetch_array( $rst) ) 
				{
				?>				
				   <tr onClick="javascript:bus_datos('<?PHP echo $rowusu['id_ins_pgo'];?>',
													 '<?PHP echo utf8_encode($rowusu['id_cuentas_bancarias']);?>',
													 '<?PHP echo utf8_encode($rowusu['id_ipgo_tipos']);?>',
													 '<?PHP echo $rowusu['descripcion'];?>',
													 '<?PHP echo $rowusu['codigo'];?>',													 
													 '<?PHP echo $rowusu['status'];?>')">
														
					  <th class="td_move" align="center" scope="row"><?PHP echo $rowusu['id_ins_pgo'];?></th>
					  <td class="td_move"><?PHP echo $rowusu['ctabanext'];?></td>
					  <td class="td_move"><?PHP echo utf8_encode($rowusu['Tipo_Instrumento']);?></td>
					  <td align="left"   class="td_move"><?PHP echo utf8_encode($rowusu['descripcion']);?></td>
					  <td class="td_move"><?PHP echo $rowusu['codigo'];?></td>
					  <td class="td_move"><?PHP echo $rowusu['status'];?></td>
					</tr>
				<?PHP
				}	  
				sqlsrv_free_stmt( $rst );  
				sqlsrv_close( $conn );
				
				?>
          </tbody>
      </table>        
    </div><!-- fin id_container3 -->    
    
    
</div> <!-- fin inicio -->

<script>
		
function bus_datos(id,
				   id_cuentas_bancarias,
				   id_ipgo_tipos,
				   descripcion,
				   codigo,
				   status)
{	
	
	$("#txt_id_ins_pgo").val(id);
	$("#cbo_id_cuentas_bancarias").val(id_cuentas_bancarias);
	$("#cbo_id_ipgo_tipos").val(id_ipgo_tipos);
	$("#txt_descripcion").val(descripcion);	
	$("#txt_codigo").val(codigo);
	$("#cbo_status").val(status);	

	if(id > 0)
		desbloquea_caja();
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
	url: "../datos/eli_instrumentos_pagos.php",
	data:"txt_id_ins_pgo="+valor,				 
    beforeSend: function(){    	    
    },	
	cache: false,			
	success: function(result) {	
		
		//alert(result)
		if(result == 1){

			$('.modal-backdrop').hide();
			$("body").removeClass("modal-open");
			
			bloquea()
			toastr.success('Datos Eliminados con Éxito !!!', "Exito !!!", {
			"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});
			setTimeout(function(){ desbloquea();}, 5000);			

			$("#contenedor").empty();
			$('#contenedor').load('../paginas/issg_instrumentos_pagos.php');	  			

			
		}else{
			toastr.error('Error Eliminando los datos en  la tabla < ISSG_INSTRUMENTOS_PAGOS > !!!', "Error !!!", {
			"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});				
			return false;			
		}
	},	
	error: function(error) {				
		alert("Problemas con la pagina alm_aso_contab_presup ... comuniquese con el Personal de Sistemas !!!" + error);
		}		
	});

}

$(document).ready(function(){  

var posicion_scroll = $("#1").offset().top;

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
		$('#txt_descrip').focus();
		
	//------------------------->
	//PROCESO DE GUARDADO	
	$('#btn_nuevo').on('click', function(){	
	
		desbloquea_caja_nuevo();
		$("#txt_id_ins_pgo").val(0);	
		$("#txt_descrip").val('');
		$("#cbo_id_cuentas_bancarias").val('');
		$("#cbo_id_ipgo_tipos").val('');
		$("#cbo_status").val('');
	
		$("#txt_descrip").focus();		
	});
	
	
	$('#btn_guardar').on('click', function(){	

		//inicio de validaciones		
		var txt_id_ins_pgo				= 	$("#txt_id_ins_pgo").val();
		var cbo_id_cuentas_bancarias	= 	$.trim($("#cbo_id_cuentas_bancarias").val());
		var cbo_id_ipgo_tipos			= 	$.trim($("#cbo_id_ipgo_tipos").val());
		var cbo_status					= 	$.trim($("#cbo_status").val());
			

		if(txt_id_ins_pgo == '')
		{
			 bloquea();
			 toastr.error("Error debe  -- <b> Selecionar un Id o tocar el Boton Nuevo <b/> --", "Error !!!", {
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
		
		
		if(cbo_id_cuentas_bancarias == '')
		{
			 bloquea();
			 toastr.error("Error en en Campo -- <b> CUENTA BANCARIA <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#cbo_id_cuentas_bancarias").focus();
			setTimeout(function(){ desbloquea();}, 2000);
			return false;				
		}
		
			if(cbo_id_ipgo_tipos == '')
			{
				 bloquea();
				 toastr.error("Error en en Campo -- <b> TIPO DE INSTRUMENTO <b/> --", "Error !!!", {
				  "showDuration": "50",
				  "hideDuration": "500",
				  "timeOut": "2000",
				  "extendedTimeOut": "1000",
				  "preventDuplicates": true,
				  "onclick": null,
				  "progressBar": true,
				  "positionClass": "toast-bottom-full-width"
				});	
				$("#cbo_id_ipgo_tipos").focus();
				setTimeout(function(){ desbloquea();}, 2000);
				return false;				
			}

		
		if(cbo_status == '')
		{
			 bloquea();
			 toastr.error("Error en en Campo -- <b> STATUS <b/> --", "Error !!!", {
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
			url: "../datos/alm_instrumentos_pagos.php",
			data:"txt_id_ins_pgo="+$("#txt_id_ins_pgo").val()+
			 "&cbo_id_cuentas_bancarias="+$("#cbo_id_cuentas_bancarias").val()+
			 "&cbo_id_ipgo_tipos="+$("#cbo_id_ipgo_tipos").val()+
			 "&cbo_status="+$("#cbo_status").val(),
			cache: false,			
			success: function(result) {	
			//alert(result);			
				if(result == 1){		
						
					bloquea()
					toastr.success('Datos Almacenados con Éxito !!!', "Exito !!!", {
					"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});				
					setTimeout(function(){ desbloquea();}, 5000);

					$("#contenedor").empty();
					$('#contenedor').load('../paginas/issg_instrumentos_pagos.php');							
				
				}else if(result == 2){

					bloquea()
					toastr.success('Datos Actualizados con Éxito !!!', "Exito !!!", {
					"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});				
					setTimeout(function(){ desbloquea();}, 5000);

					$("#contenedor").empty();
					$('#contenedor').load('../paginas/issg_instrumentos_pagos.php');

				}else{
					toastr.error('Error Insertando los datos en  la tabla < ISSG_INSTRUMENTOS_PAGOS> !!!', "Error !!!", {
					"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});
					return false;			
				}		
			},			
			error: function(error) {				
				alert("Problemas con la pagina alm_instrumentos_pagos ... comuniquese con el Personal de Sistemas !!!" + error);
				}		
			});	
	});		
		
	$('#btn_eliminar').on('click', function(){
		var valor;
		valor = $('#txt_id_ins_pgo').val();		
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
	$('#cbo_id_cuentas_bancarias').attr('disabled','0');	
	$('#cbo_id_ipgo_tipos').attr('disabled','0');	
	$('#cbo_status').attr('disabled','0');
}

function desbloquea_caja()
{
	$('#cbo_id_cuentas_bancarias').attr('disabled',false);	
	$('#cbo_id_ipgo_tipos').attr('disabled',false);	
	$('#cbo_status').attr("disabled", false);
}

function desbloquea_caja_nuevo()
{
	$('#cbo_id_cuentas_bancarias').attr('disabled',false);	
	$('#cbo_id_ipgo_tipos').attr('disabled',false);	
	$('#cbo_status').attr("disabled", false);
}
</script>
</body>
</html>