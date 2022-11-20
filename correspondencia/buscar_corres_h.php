<?php include("../inc.config.php");

      $busca = $_POST['b'];

      $b = $link->real_escape_string($busca);

            $sql =" SELECT idcorres, gestion, correlativo, idusuario, referencia, procedencia, ";
            $sql.=" no_control, fecha_corres, anexo, idestado, codigo FROM corres ";
            $sql.=" WHERE codigo LIKE '%$b%' ORDER BY idcorres ";
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
                        $codigo       = $row[10];

                        echo $codigo.".-  ".$referencia." Fecha: ".$fecha_corres." </br> ";	
                        echo "<input name='idcorres' type='radio' value=".$idcorres."> SELECCIONAR";
                        echo "</br>";	
                        echo "</br>";                     
                  }
            }

?>