<?PHP
header("Content-Type: text/html;charset=utf-8");
setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
date_default_timezone_set('America/Caracas');
include("../conexion/conexionsqlsrv.php");
include("../validacion/validacion_general2.php");
include('../restringir/restringir.ini.php');
// ------------------------------------------------->
session_valida();
$conn = conectate();

$id_tabla		= sanear_string($_POST['id_tabla']);
$nombre_tabla	= sanear_string($_POST['nombre_tabla']);
$usuario		= sanear_string($_POST['usuario']);
$cbo_status		= sanear_string($_POST['cbo_status']);


$valor_consulta = 0;

$qry  =  "SET ANSI_NULLS ON SET ANSI_WARNINGS ON EXEC [dbo].[SP_ACT_STATUS] ";
$qry .=  "'".$nombre_tabla."'";
$qry .=  ",".$id_tabla."";
$qry .=  ",".$usuario."";
$qry .=  ",".$cbo_status."";
$rst = sqlsrv_query( $conn, $qry, array(), array("Scrollable"=>"buffered"));
if (! $rst) {  
   echo "Error en la ejecución de la instrucción ".$qry.".\n";
   die( print_r2( sqlsrv_errors(), true));  
   exit;
}else{
     $valor_consulta = 1;
} 
sqlsrv_free_stmt( $rst );  
sqlsrv_close( $conn );  

echo $valor_consulta;
?>
