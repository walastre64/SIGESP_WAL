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

$txt_id_ins_pgo	= sanear_string($_POST['txt_id_ins_pgo']);
$valor_consulta = 0;

$qry  =  "SET ANSI_NULLS ON SET ANSI_WARNINGS ON [dbo].[SP_ELI_INSTRUMENTOS_PAGOS] ";
$qry .=    "".$txt_id_ins_pgo."";
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
