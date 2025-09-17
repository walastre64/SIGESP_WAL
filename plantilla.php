<?PHP
include("conexion/conexionsqlsrv.php");
include("validacion/validacion.php");
conectate();
session_start();
session_destroy();
session_unset();
session_start()
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

    <link rel='icono' type='image/x-icon' href='imagenes/ICO/favicon.ico' />


    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">
	<!-- FIM Bootstrap CSS -->
    <title>Hello, world!</title>
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
  
<body id="body" background="imagenes/GIF/bodybkg.gif";>



<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Optional JavaScript -->
   <script type='text/javascript' src="validacion/validacion_general.js"></script>   
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
	<script src="jquery/jquery321.js" crossorigin="anonymous"></script>	
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
	<script src="jquery/popper.min.js" crossorigin="anonymous"></script>    
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
	<script src="bootstrap/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
  </body>
</html>