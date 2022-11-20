<?php include("../inc.config.php");

      $busca = $_POST['b'];

      $b = $link->real_escape_string($busca);

            $sqla =" SELECT adjunto_hr.idadjunto_hr, adjunto_hr.cite, adjunto_hr.ref, adjunto_hr.fecha, adjunto_hr.idcorres,  ";
            $sqla.=" tipo_documento.tipo_documento FROM adjunto_hr, tipo_documento WHERE adjunto_hr.idtipo_documento=tipo_documento.idtipo_documento";
            $sqla.="  AND cite LIKE '%$b%' ORDER BY adjunto_hr.idadjunto_hr ";
            $resulta = mysqli_query($link,$sqla);

            $contar = mysqli_num_rows($resulta);

            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while(
                        $rowa = mysqli_fetch_array($resulta)){
                        $idadjunto_hr = $rowa[0];
                        $cite         = $rowa[1];
                        $ref          = $rowa[2];                       
                        $fecha_o      = explode('-',$rowa[3]);
                        $fecha_of     = $fecha_o[2].'/'.$fecha_o[1].'/'.$fecha_o[0];
                        $idcorres_h      = $rowa[4];
                        $tipo_documento  = $rowa[5];

                        echo "<h4><h4 class='text-primary'>".$tipo_documento." - ".$cite.".-  ".$ref." - Fecha: ".$fecha_of."</h4>";	
                        echo "<input name='idcorres_h' type='hidden' value=".$idcorres_h.">";
                        echo "<input name='idadjunto_h' type='radio' value=".$idadjunto_hr."> SELECCIONAR";
                        echo "</br>";	                                           
                  }
            }

?>