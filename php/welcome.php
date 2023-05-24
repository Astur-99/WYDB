<!DOCTYPE html>
<html>
<head>
  <title>Contenido del Directorio</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-image: url('../sources/background.jpg');
      bacground-size: cover;
      bacground position: center;
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
      margin-bottom: 5px;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h1>¡Disfruta de las pelis!</h1>
  <ul>
    <?php
      $directorio = '../pelis';
      $archivos = scandir($directorio);

      foreach ($archivos as $archivo) {
        if ($archivo !== '.' && $archivo !== '..' && pathinfo($archivo, PATHINFO_EXTENSION) === 'mp4') {
          $rutaCompleta = $directorio . '/' . $archivo;
          echo '<li><a href="' . $archivo . '">' . $archivo . '</a> <a href="' . $rutaCompleta . '" download><button>Descargar</button></a></li>';
        }
      }
    ?>
  </ul>
</body>
</html>

