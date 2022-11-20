<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form id="form">
  <label for="nombre">Nombre* </label>
  <input type="text" name="nombre" id="nombre" required pattern="^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$"/>
  <label for="nombre"> Referencia: </label>
  <input type="text" id="referencia" name="referencia" required pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" 
  title="La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico" />
  <button id="enviar">Enviar</button>
  <span role="alert" id="nombreError" aria-hidden="true">
    Ingrese su nombre, por favor
  </span>
</form>

</body>
</html>