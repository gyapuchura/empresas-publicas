<?php include("../inc.config.php");

      $busca = $_POST['b'];

      $b = $link->real_escape_string($busca);

            $sql =" SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, ";
            $sql.=" no_control, fecha_corres, anexo, idestado FROM corres ";
            $sql.=" WHERE referencia LIKE '%$b%' ORDER BY idcorres ";
            $resultd = mysqli_query($link,$sql);

            $contar = mysqli_num_rows($resultd);

            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while(

                        $row = mysqli_fetch_array($resultd)){
                        $idcorres    = $row[0];
                        $correlativo = $row[2];
                        $referencia  = $row[4];
                        $fecha_corres = $row[7];

                        echo $correlativo.".- ".$referencia." Fecha: ".$fecha_corres."  ";
                        echo "<form name='ENCUENTRA' action='valida_correlativo_ref.php' method='post'>";
                        echo "<input name='correlativo' type='hidden' value=".$correlativo.">";	
                        echo "<button type='submit' class='btn btn-primary'>BUSCAR HOJA DE RUTA</button>";
                        echo "</form>";
                        echo "</BR>";                       
                  }
            }

?>