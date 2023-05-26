<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Contenido del Directorio</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-image: url('../sources/welcome_background.jpg');
      background-size: cover;
      background-position: center;
    }

    h1 {
      text-align: center;
      color: white;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      margin-bottom: 10px;
      background-color: rgba(255, 255, 255, 0.3);
      padding: 10px;
    }

    a {
      text-decoration: none;
      color: white;
    }

    .boton-descarga {
      display: inline-block;
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 12px;
      margin-left: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1><?php echo utf8_encode('¡Disfruta de las pelis!'); ?></h1>
  <ul>
   <?php
header('Content-Type: text/html; charset=utf-8');

$directorio = '../pelis';
$archivos = scandir($directorio);

foreach ($archivos as $archivo) {
  if ($archivo !== '.' && $archivo !== '..' && pathinfo($archivo, PATHINFO_EXTENSION) === 'mp4') {
    $nombreArchivo = pathinfo($archivo, PATHINFO_FILENAME);
    $rutaCompleta = $directorio . '/' . $archivo;
echo '<li><a>' . $nombreArchivo . '</a> <a href="./pelis_info/info_' . pathinfo($archivo, PATHINFO_FILENAME) . '.php" style="padding: 5px 10px; background-color: #eaeaea; color: #333; text-decoration: none; border-radius: 4px;">Info</a> <a href="' . $rutaCompleta . '" download><button class="boton-descarga">Descargar</button></a></li>';


  }
}
?>
  </ul>
</body>
</html>

