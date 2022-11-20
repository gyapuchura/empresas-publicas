<?php include("../cabf.php");?>
<?php 
include('../inc.config.php');

date_default_timezone_set('America/La_Paz');
$fecha_ram				= date("Ymd");
$fecha 					= date("Y-m-d");

$idusuario_ss = $_SESSION['idusuario_ss'];

$idcorres   =  $_POST['idcorres'];
$referencia =  $_POST['referencia'];
$idestado   =  $_POST['idestado'];
$resumen    =  $link->real_escape_string($_POST['resumen']);
$codigo     =  $_POST['codigo'];

    $sqle    = "SELECT MAX(correlativo) FROM bitacora_estado WHERE idcorres='$idcorres'";
    $resulte = mysqli_query($link,$sqle);
    $rowe    = mysqli_fetch_array($resulte);
    $numero  = $rowe[0]+1;

$codigo_doc  = $codigo."-DOC-".$numero;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $file_name = $_FILES['file']['name'];

    $new_name_file = null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['file']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'pdf') {
            $dir = 'files/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['file']['tmp_name'];

            $file2 = file_get_contents($file_tmp_name);
        
            $file_cge = base64_encode($file2);

         echo "<br>";

         $ch = curl_init();

         $bodyArr = [		
            'documentos' => [
                [
                'denominacion_documento' => 1,
                'nombre_original'        => $file_name,
                'tipo_mime'              => $file_type,
                'direccion_fisica'       => [],
                'metadatos'              => [
                    'fecha_metadato'         => $fecha,
                    'metadato_id'            => 1,
                    'id_externo'             => [
                        'codigo_doc'             => $codigo_doc,
                        'referencia'             => $referencia,
                        '$resumen'               => $resumen
                        ]
                    ],
                    'base64'  => $file_cge
                    ]
            ]	    
        ];

//------ se debe probar con esta parte del cURL --------

$token="Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjlhN2ZhZGUyLTRhYTQtNGUxMS1hMmE2LTE5MDc3MzgyYzExMiIsInRpcG8iOiJzaXN0ZW1hIiwic2lzX2NvZGlnbyI6MTIsInNpZ2xhIjoiU0lHQVJFU1QiLCJkZXNjcmlwY2lvbiI6IlNJU1RFTUEgU0lHQSBSRVNUIiwibW9tZW50IjoiMjAyMC0wNy0wM1QxMToxMDowMS0wNDowMCIsImlhdCI6MTU5Mzc4OTAwMX0.e-ogRwi46h9LQb534mWCAzpTHHZtmrlXRc2G7easZ4PHA-iBCNHADi0uOJC3o_qssGiBfn54SZCHQf1S8dJ-MA";

$body = json_encode($bodyArr);

$url = 'http://172.16.80.32:7007/api/v1/archivo_digital/documento';

$ch = curl_init($url) or die("Error");

curl_setopt_array($ch, array(
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $body,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization:'.$token,
        'Content-Description: File Transfer',
        'Content-Length: ' . strlen($body)),                         
    CURLOPT_RETURNTRANSFER => 1));
   
    $resultado = curl_exec($ch); 
    $verifica = json_decode($resultado,true);

//------ Se extrae los valores archivo_id y hash del array verifica --------//

$hash_in    = $verifica ["datos"][0]["hash"];

$archivo_id  = $verifica ["datos"][0]["archivo_id"];

$error_repite = $verifica ["datos"][0]["error_mensaje"];

if ($error_repite == "") {

    $ins = $link->query(" INSERT INTO bitacora_estado (idcorres, correlativo, idestado, resumen, fecha, codigo_doc, archivo_id, hash, idusuario) VALUES ('$idcorres','$numero','$idestado','$resumen','$fecha','$codigo_doc','$archivo_id','$hash_in','$idusuario_ss') ");

    header("Location:deriva_hoja_ruta_corres.php");

} else {
    header("Location:error_subir_doc.php");
}
        }
    }
else { 
$ins = $link->query(" INSERT INTO bitacora_estado (idcorres, correlativo, idestado, resumen, fecha, codigo_doc, archivo_id, hash, idusuario) VALUES ('$idcorres','$numero','$idestado','$resumen','$fecha','','','','$idusuario_ss') "); 
  
  header("Location:deriva_hoja_ruta_corres.php");
}

}
?>