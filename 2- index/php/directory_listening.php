<?php
  $directorio = '/var/www/html/pelis';
  $archivos = scandir($directorio);

  foreach ($archivos as $archivo) {
    if ($archivo !== '.' && $archivo !== '..' && pathinfo($archivo, PATHINFO_EXTENSION) === 'mp4') {
      $rutaCompleta = $directorio . '/' . $archivo;
      echo '<li><a href="' . $rutaCompleta . '">' . $archivo . '</a> <a href="' . $rutaCompleta . '" download><button>Descargar</button></a></li>';
    }
  }
?>
