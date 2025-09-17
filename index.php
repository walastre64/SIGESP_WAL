<?PHP
include("conexion/conexionsqlsrv.php");
include("validacion/validacion.php");
conectate();
session_start();
session_destroy();
session_unset();
session_start();
$ano = date("Y");

?>
<!--[if lt IE 10]> <!DOCTYPE html> <meta http-equiv="X-UA-Compatible" content="chrome=1"> <![endif]--> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="Pragma"  content="no-cache" />

    <link rel='shortcut icon' type='image/x-icon' href='imagenes/ICO/ipsfa.ico' />
	<link rel="stylesheet"  href="css/style_login.css"/> 

	<!-- JQUERY -->
	<script src="jquery/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<link rel="stylesheet" href="bootstrap/dist/awesome/css/font-awesome.min.css" 	crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" 				crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap/dist/toastr/toastr.min.css"  			crossorigin="anonymous">
	<!-- FIM Bootstrap CSS -->
    <title>Acceso:: SIGESP-SAINT</title>

<style type="text/css">
<!--
-->
</style>

<script type="text/javascript">
$(document).ready(function(){
	$(":input:first").focus();

	$('#div_carga')
				.hide()
				.ajaxStart(function() {
					$(this).show();
				})
				.ajaxStop(function() {
					$(this).hide();
	});

 	$('#id_olvido').on('shown.bs.modal', function () {
		$('#txt_email_olvidado').focus();
	})

	$('#txt_usuario').focus();
	$("#div_registrar").hide();


	$('#login-form-link').click(function(e) {

		$("form:not(.filter) :input:visible:enabled:first").focus();
		$('[tabindex=4]').focus();
		$("#txt_usuario").focus();

		$("#txt_usuario").val("");
		$("#txt_password").val("");

		$("#div_login").delay("slow").fadeIn();	
		$("#div_registrar").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();		
	});
	
	$('#register-form-link').click(function(e) {

		$("form:not(.filter) :input:visible:enabled:first").focus();
		$('[tabindex=9]').focus();
		$("#txt_cedulaR").focus();
		
				
		$("#div_registrar").delay("slow").fadeIn();
		$("#div_login").fadeOut(100);	
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();	
		$("#txt_cedulaR").val("");
		$("#txt_passwordR").val("");
		$("#txt_email").val("");
		$("#txt_confirmar").val("");
		$("#txt_nombreR").val("");
		$("#txt_apellidoR").val("");
	});
	
	
	function limpiar_registrar(){
		$('#txt_cedulaR').focus();
		$("#txt_cedulaR").val("");
		$("#txt_passwordR").val("");
		$("#txt_email").val("");
		$("#txt_confirmar").val("");
		$("#txt_nombreR").val("");
		$("#txt_apellidoR").val("");
		$('#div_carga').hide();	
	}
	
	function limpiar_olvido(){
		$("#txt_email_olvidado").val("");
		$('#div_carga').hide();	
	}	

	function enviar(ruta){
		var url = ruta
		$(location).attr('href',url);	
	}

	var TimeOut = 15;

	$("#txt_usuario").keypress(function(e){
	
		TimeOutTempo = TimeOut;
		var code = (e.keyCode ? e.keyCode : e.which);
		 if(code == 13) { 
			$("#btn_login").click();
		 }
	
	});
	
	$("#txt_password").keypress(function(e){
	
		TimeOutTempo = TimeOut;
		var code = (e.keyCode ? e.keyCode : e.which);
		 if(code == 13) { 
			$("#btn_login").click();
		 }	
	});	
	
	
	$("#btn_login").click(function(){		 	
		 
		var User = $.trim($("#txt_usuario").val());
		var Pass = $.trim($("#txt_password").val());			
		
		$('#div_carga').show();
		
		if(User.length <1 || User.length < 7)
		{
			 toastr.error("Error en en Campo -- <b> CEDULA <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_usuario").focus();
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false;
		}	

		if(Pass.length <1 )
		{
			 toastr.error("Error en en Campo -- <b> PASSWORD <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_password").focus();
			document.getElementById('txt_password').value = '';
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false;		
		}	
		
		var tamano; 
		tamano = (Pass.length);
		
		if(tamano < 4)
		{
			 toastr.error("El en en Campo -- <b> PASSWORD <b/> -- debe tener mas de 4 Caracteres", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_password").focus();
			document.getElementById('txt_password').value = '';
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false;	
		}
		//--------------------------------------- fin validacion			
		
		$.ajax({
		type: "POST",
		dataType:"html",
		url: "datos/bus_usuario_registrado.php",
		data:"txt_usuario="+$("#txt_usuario").val()+
			 "&txt_password="+$("#txt_password").val(),
		cache: false,			
		success: function(result) {	
		resultado=result.split("/");
		//alert(result);
			if(resultado[0] == 1){		
				$('#div_carga').hide();		
				location.href='menu/principal.php';
				return result;
			
			}else{
			    toastr.error('Usuario ó Clave incorreta !!!', "Error !!!", {
				"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"        		});	
			    $("#txt_password").focus();					
				setTimeout(function(){ $('#div_carga').hide();}, 2000);
				return false;			
			}		
		},			
		error: function(error) {				
			alert("Problemas con el Ingreso al Sistema ... comuniquese con el Personal de Sistemas !!!" + error);
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			}		
		});	
	});	<!-- fin btn_login -->
	
	
<!-- ----------------------------------  -->
<!-- ----------------------------------  -->
		<!--REGISTRAR -->
<!-- ----------------------------------  -->	
<!-- ----------------------------------  -->	
	$("#btn_registrar").click(function(){	
		
		$('#div_carga').show();
		var cedula = $.trim($("#txt_cedulaR").val());			

		if(cedula.length <1 || cedula.length < 7)
		{
			 toastr.error("Error en en Campo -- <b> CEDULA <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_cedulaR").focus();
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false;
			
		}
		
		var txt_nombreR = $.trim($("#txt_nombreR").val());
		if((txt_nombreR.length < 2) || txt_nombreR == '')
		{
			 toastr.error("Error en en Campo -- <b> Nombre <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
	        });	
			$("#txt_nombreR").focus();
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false;			
		}	

		var txt_apellidoR = $.trim($("#txt_apellidoR").val());
		if(txt_apellidoR.length <1 || txt_apellidoR.length < 5 || txt_apellidoR == '')
		{
			 toastr.error("Error en en Campo -- <b> Apellido <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
	        });	
			$("#txt_apellidoR").focus();
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false;			
		}	
		
				
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;		
		if (regex.test($('#txt_email').val().trim()) == false) {
			 toastr.error("Error en en Campo -- <b> Email <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_email").focus();
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false				
		}


		
		var regex2 =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}[^'\s]/;
		//alert(regex2.test($('#txt_email').val());
		var pas1 = $('#txt_passwordR').val();
		var pas2 = $('#txt_confirmar').val();
		if (regex2.test(pas1.trim()) == false){
			 toastr.error("Error en en Campo -- <b> Passwor <b/> -- <br>- Minimo 6 caracteres <br>- Maximo 8 caracteres <br>- Al menos una letra mayúscula <br>- Al menos una letra Minúscula <br>- Al menos un dígito Numerico <br>- No espacios en blanco <br>- Al menos 1 caracter especial", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_passwordR").focus();
			$('#div_carga').hide();	
			return false				
		}
		if(pas1 != pas2){
			   toastr.error("Error en en Campo -- <b>La Confirmación no coincide con el Password <b/>", 
			   "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_passwordR").focus();
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false	
		}

		txt_nombreR 	= MaysPrimera(txt_nombreR.toLowerCase());
		txt_apellidoR	= MaysPrimera(txt_apellidoR.toLowerCase());
		
		$.ajax({
		type: "POST",
		dataType:"html",
		url: "datos/alm_usuario_registrado.php",
		data:"txt_cedulaR="+$("#txt_cedulaR").val()+
			 "&txt_passwordR="+$("#txt_passwordR").val()+
			 "&txt_email="+$("#txt_email").val()+
			 "&txt_nombreR="+txt_nombreR+
			 "&txt_apellidoR="+txt_apellidoR
			 ,
		cache: false,			
		success: function(result) {	
		resultado=result.split("/");
		//alert(resultado[0]);
			if(resultado[0] == 1){
					
			toastr.success('Datos Almacenado con Éxito !!!', "Exito !!!", {
			"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});
			setTimeout(function(){ limpiar_registrar(); window.location.href = "index.php"}, 3000);
			}else if(resultado[0] == 2) {

			    toastr.error('Esta Cedula ya esta registrada !!!', "Error !!!", {
				"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});	
			    $("#txt_email").focus();
				setTimeout(function(){ $('#div_carga').hide();}, 2000);
				return false;			
			
			}else if(resultado[0] == 3) {
			    toastr.error('Correo Existente !!!', "Error !!!", {
				"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});	
			    $("#txt_cedulaR").focus();
				setTimeout(function(){ $('#div_carga').hide();}, 2000);
				return false;
		 	}else{
			    toastr.error('Error Insertando Datos !!!', "Error !!!", {
				"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});	
			    $("#txt_cedulaR").focus();
				setTimeout(function(){ $('#div_carga').hide();}, 2000);
				return false;
							
			}		
		},			
		error: function(error) {				
			alert("Problemas con el Ingreso al Sistema ... comuniquese con el Personal de Sistemas !!!" + error);
			$('#div_carga').hide();	
			}		
		});
			
	}); <!-- fin btn_registrar-->
	
	
	
	$("#btn_aceptar_olvido").click(function(){	
		$('#div_carga').show();
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;		
		if (regex.test($('#txt_email_olvidado').val().trim()) == false) {
			 toastr.error("Error en en Campo -- <b> Email <b/> --", "Error !!!", {
			  "showDuration": "50",
			  "hideDuration": "500",
			  "timeOut": "2000",
			  "extendedTimeOut": "1000",
			  "preventDuplicates": true,
			  "onclick": null,
			  "progressBar": true,
			  "positionClass": "toast-bottom-full-width"
        	});	
			$("#txt_email_olvidado").focus();
			setTimeout(function(){ $('#div_carga').hide();}, 2000);
			return false				
		}		
		
		
		<!-- verificar correo exista-->
		$.ajax({
		type: "POST",
		dataType:"html",
		url: "datos/bus_correo_registrado.php",
		data:"txt_email_olvidado="+$("#txt_email_olvidado").val(),
		cache: false,			
		success: function(result) {	
		resultado=result.split("/");
		//alert(resultado[0]);
			if(resultado[0] == 1){
						
				<!-- ------------------------ -->
				<!-- Envio de correo existente-->
				<!-- ------------------------ -->
				
				toastr.success('Datos Enviados con Éxito !!!', "Exito !!!", {
				"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});
				setTimeout(function(){ limpiar_registrar(); enviar("index.php")}, 2000);
			
			}else if(resultado[0] == 2) {

			    toastr.error('Este Correo no esta registrado !!!', "Error !!!", {
				"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});	
			    $("#txt_email").focus();
				setTimeout(function(){ $('#div_carga').hide();}, 2000);
				return false;			
			
			}else{
			    toastr.error('Error Buscando Correo existente !!!', "Error !!!", {
				"showDuration": "50","hideDuration": "500","timeOut": "2000","extendedTimeOut": "1000","preventDuplicates": true,"onclick": null,"progressBar": true,"positionClass": "toast-bottom-full-width"});	
			    $("#txt_cedulaR").focus();
				setTimeout(function(){ $('#div_carga').hide();}, 2000);
				return false;			
			}		
		},			
		error: function(error) {				
			alert("Problemas con el Ingreso al Sistema ... comuniquese con el Personal de Sistemas !!!" + error);
			$('#div_carga').hide();	
			}		
		});
		
		
		
		<!-- FIN verificar correo exista-->
		
	});	<!-- fin btn_aceptar_olvido-->
	
}); <!-- fin document.ready -->


function MaysPrimera(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}

</script>
</head>  
<script type="text/javascript">
	var texto  = 'Chrome';
	var texto2 = 'Firefox';
	var texto3 = 'Safari';
	var cadena= navigator.userAgent;
		if(cadena.indexOf(texto) == -1  && cadena.indexOf(texto2) == - 1 && cadena.indexOf(texto3) == - 1){
		   window.location.href="restringir/explorador.html";
	}
</script> 


  
<body oncontextmenu="return false" id="body" background="imagenes/GIF/bodybkg2.gif">

<div id="div_carga">
	<!--<img id="cargador" src="imagenes/GIF/loading2.gif"/>; -->
</div>

<div id="container" class="container">

     <!--inicio div_titulo -->
	 <div id="div_titulo" class="row justify-content-center border rounded">
		<h4 class="pt-3 pb-2"><strong>Sistema de Integración SAINT - SIGESP</strong></h4>
	 </div> 
	 <!--fin div_titulo -->

	 <div id="div_caja1" class="row justify-content-center border rounded">
		<div id="div_caja2" class=" modal-body container-fluid border justify-content-center rounded border border-info">
			<div id="div_caja3" class="col-lg-12 rounded">	
				<div id="col12" class="col-md-12 col-md-offset-3">
					<div id="panellogin" class="panel panel-login">
						<div id="panelheading" class="panel-heading border rounded">
							
							<div id="row" class="row justify-content-center">
								<div class="col-sm-5 justify-content-center">
									<br>
									<a href="#" class="active" tabindex="1" id="login-form-link">Login</a>
								</div>	
	<div class="col-sm-1 justify-content-center">
	
		<div class="divisor_vertical"></div>

	</div>								
								<div class="col-sm-5 justify-content-center">
									<br>
									<a href="#" tabindex="2"  id="register-form-link">Registrarse</a>
						
								</div>
							</div>									
												
							
							<hr class="divisor">	
						
							<div id="div_login" style="padding:20px;">	
							<br>	
								<form method="POST"  name="login-form" class="form-horizontal" id="login-form">									

									<div id="cajastext">
										<div id="div_usuario" class="form-group input-control col-md-8" data-role="input">
											<input type="text"   required="" name="txt_usuario" id="txt_usuario"     tabindex="3" placeholder="Cedula"   maxlength="8" onKeyPress="return solonumeros(event)" onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'">										
										</div>
					
										<div id="div_password" class="form-group input-control col-md-8" data-role="input">
											<input type="password"  name="txt_password" id="txt_password" tabindex="4" placeholder="Password" maxlength="50" 									 onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'">
										</div>	
									</div>
																		
								   
								  <div class="form-group input-control" data-role="input" >
									<!--
									
									OJO DIV VACIOOOO
									
										<input style="margin-top:15px;" type="checkbox" tabindex="5" class="" name="remember" id="remember">
									-->
										<label style="color:#333333;" for="label">
										
										</label>										
								  
								  </div>
								  
								  	
									<hr class="divisor">
									
															
									<br>
									<div class="form-group text-center">
										<div class="row">
											<div class="mx-auto" style="width: 300px;">
												<input  type="button" name="btn_login" id="btn_login" tabindex="6"  class="form-control btn btn-outline-success" value="Aceptar">									
											</div>
										</div>
									</div>
				
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													
													<a id="id_link_olvido" href="#" tabindex="7" data-toggle="modal" data-target="#id_olvido">Olvidó su contraseña?</a>
												
													<!-- Modal para olvido clave--> 
													<div  class="modal" id="id_olvido" data-backdrop="static" data-keyboard="false">
													  <div class="modal-dialog">
														<div class="modal-content">
													
														  <!-- Modal cabecera -->
														  <div class="modal-header">
															<h4 class="modal-title">Envio de Clave olvidada</h4>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														  </div>
													
														  <!-- Modal cuerpo -->
														  <div class="modal-body">
															<input type="email" style="width:400px" name="txt_email_olvidado" id="txt_email_olvidado"  tabindex="8"  placeholder="Direccion Correo registrada" 	onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'" value="" >
														  </div>
													
														  <!-- Modal pie -->
														  <div class="modal-footer">
															<button id="btn_aceptar_olvido"  type="button" class="btn btn-primary">Aceptar</button>
														  </div>
													
														</div>
													  </div>
													</div>
													<!-- fin Modal --> 													
													
												</div>
											</div>
										</div>
									</div>
							  </form>
						  </div><!-- fin div_login -->
						  
						  
						
<!------------------------------------------------------------------------------------------ -->
<!------------------------------------------------------------------------------------------ -->						
								<!-- REGISTRAR -->
<!------------------------------------------------------------------------------------------ -->
<!------------------------------------------------------------------------------------------ -->
								
								<div align="center" id="div_registrar">
									<br>
									<form id="register-form" action="" method="post" role="form" >
										
										<div class="form-group col-md-8 pb-8" >
											<input type="text" 		name="txt_cedulaR"  	 id="txt_cedulaR" 	  tabindex="9"   placeholder="Cedula" 			maxlength="8" onKeyPress="return solonumeros(event)" 					onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'" value="" >
										</div>
										<div class="form-group col-md-8" >
											<input type="text" 		name="txt_nombreR" 	 	 id="txt_nombreR" 	  tabindex="10"  placeholder="Nombres" 			maxlength="50" onKeyUp="javascript:this.value=this.value.toUpperCase();"	 onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'" value="" >
										</div>									
										<div class="form-group col-md-8" >
											<input type="text" 		name="txt_apellidoR" 	 id="txt_apellidoR"   tabindex="11"  placeholder="Apellidos" 		maxlength="50" onKeyUp="javascript:this.value=this.value.toUpperCase();"	onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'" value="" >
										</div>
										<div class="form-group col-md-8" >		
											<input type="email" 	name="email" 			 id="txt_email"		  tabindex="12"  placeholder="Direccion Email" 														 					onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'" value="" >
										</div>										
										<div class="form-group col-md-8" >	
											<input type="password" 	name="txt_passwordR" 	 id="txt_passwordR"	  tabindex="13"  placeholder="Password" 															 					onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'" >
										</div>	
										<div class="form-group col-md-8" >	
											<input type="password" 	name="txt_confirmar"     id="txt_confirmar"   tabindex="14"  placeholder="Confirmar Password" 													 					onFocus="this.style.backgroundColor='#DDFEDA'" onBlur="this.style.backgroundColor='white'" >
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="mx-auto col-md-4 ">
													<input type="button"  name="btn_registrar" id="btn_registrar" tabindex="15" class="form-control btn btn-outline-success" value="Registrarse">
												</div>
											</div>
										</div>
									</form>					
								</div><!-- fin div_registrar -->							
						</div><!--fin panelheading -->
					</div><!--fin row -->	
			  </div><!--fin panellogin -->				
		  </div><!--fin col12 -->			
	   </div><!--fin div_caja3 -->					
			
				<footer>
					<b id="pie">2018 - <?PHP echo $ano;?>, Innova Soluciones, S.A &copy; Elaborado por la <a href="mailto:walastre@hotmail.com"> Gerencia de Sistemas Innova Soluciones</a></b>				
				</footer>	
  </div> <!--fin div_caja2 -->	 
</div>  <!--fin div_caja1 -->
	 
	 
</div> <!--fin container -->

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script type='text/javascript' src="validacion/validacion_general.js"></script>   	
   <script type='text/javascript' src="bootstrap/dist/toastr/toastr.min.js"></script>   
   <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
   <script src="bootstrap/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
</body>
</html>