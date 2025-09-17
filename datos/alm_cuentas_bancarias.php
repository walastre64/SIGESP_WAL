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

$txt_id_cuentas_bancarias 	= sanear_string($_POST['txt_id_cuentas_bancarias']);
$cbo_id_cta_contable		= sanear_string($_POST['cbo_id_cta_contable']);
$cbo_id_banco		        = sanear_string($_POST['cbo_id_banco']);
$cbo_id_programa_detalle	= sanear_string($_POST['cbo_id_programa_detalle']);
$txt_codemp					= sanear_string($_POST['txt_codemp']);
$txt_ctaban					= sanear_string($_POST['txt_ctaban']);
$txt_codban					= sanear_string($_POST['txt_codban']);
$txt_ctabanext				= sanear_string($_POST['txt_ctabanext']);
$txt_dencta					= sanear_string($_POST['txt_dencta']);
$cbo_status					= sanear_string($_POST['cbo_status']);

$valor_consulta = 0;

$qry  =  "SET ANSI_NULLS ON SET ANSI_WARNINGS ON EXEC [SP_ALM_CUENTAS_BANCARIAS] ";
$qry .=    "".$txt_id_cuentas_bancarias."";
$qry .=  ",'".$cbo_id_cta_contable."'";
$qry .=  ",'".$cbo_id_banco."'";
$qry .=  ",'".$cbo_id_programa_detalle."'";
$qry .=  ",'".$txt_codemp."'";
$qry .=  ",'".$txt_codban."'";
$qry .=  ",'".$txt_ctaban."'";
$qry .=  ",'".$txt_ctabanext."'";
$qry .=  ",'".$txt_dencta."'";
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
