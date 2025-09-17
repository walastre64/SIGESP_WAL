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

$txt_id_ins_pgo 			= sanear_string($_POST['txt_id_ins_pgo']);
$cbo_id_cuentas_bancarias	= sanear_string($_POST['cbo_id_cuentas_bancarias']);
$cbo_id_ipgo_tipos			= sanear_string($_POST['cbo_id_ipgo_tipos']);
$cbo_status					= sanear_string($_POST['cbo_status']);


$valor_consulta = 0;

$qry  =  "SET ANSI_NULLS ON SET ANSI_WARNINGS ON EXEC [SP_ALM_INSTRUMENTOS_PAGOS] ";
$qry .=    "".$txt_id_ins_pgo."";
$qry .=  ",'".$cbo_id_cuentas_bancarias."'";
$qry .=  ",'".$cbo_id_ipgo_tipos."'";
$qry .=  ",'".$cbo_status."'";


$rst = sqlsrv_query( $conn, $qry, array(), array("Scrollable"=>"buffered"));
if (! $rst) {  
   echo "Error en la ejecución de la instrucción ".$qry.".\n";
   die( print_r2( sqlsrv_errors(), true));
   exit;
}else{
	while( $rowsu = sqlsrv_fetch_array($rst)){
		
		$valor_consulta = $rowsu[0]; // 0 error de conexion - 1 nuevo - 2 actualizo
	}
} 
sqlsrv_free_stmt( $rst );  
sqlsrv_close( $conn );

echo $valor_consulta;
?>
