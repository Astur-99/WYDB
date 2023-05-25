<?php
// Validamos datos del servidor
$user = "root";
$pass = "pogagu22";
$host = "11.11.11.200";
$db_name = "wydb";

// Conectamos a la BBDD
$connection = mysqli_connect($host, $user, $pass, $db_name);

// Verificamos la conexión a la BBDD
if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
} else {

}

// Comprobamos si la conexión se realizó correctamente
if (!$connection) {
    die("No se ha podido conectar con la base de datos: " . mysqli_error($connection));
}

// Consultas SQL para obtener los datos de las películas
$query = "SELECT nombre, director, genero, ano, duracion, clasificacion, pais, sinopsis, reparto, imagen, trailer FROM peliculas";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($connection));
}

// Obtener los datos de las consultas
$datos = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Cerrar la conexión
mysqli_close($connection);
?>

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
    
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }
    
  </style>
</head>
<body>
  <h1><?php echo utf8_encode('¡Disfruta de las pelis!'); ?></h1>
  <table>
        <tr>
            <th>Nombre</th>
            <th>Director</th>
            <th>Género</th>
            <th>Ano</th>
            <th>Duración</th>
            <th>Clasificación</th>
            <th>País</th>
            <th>Sinopsis</th>
            <th>Reparto</th>
            <th>Imagen</th>
            <th>Trailer</th>
        </tr>
        <?php foreach ($datos as $dato): ?>
        <tr>
            <td><?php echo $dato['nombre']; ?></td>
            <td><?php echo $dato['director']; ?></td>
            <td><?php echo $dato['genero']; ?></td>
            <td><?php echo $dato['ano']; ?></td>
            <td><?php echo $dato['duracion']; ?></td>
            <td><?php echo $dato['clasificacion']; ?></td>
            <td><?php echo $dato['pais']; ?></td>
            <td><?php echo $dato['sinopsis']; ?></td>
            <td><?php echo $dato['reparto']; ?></td>
            <td><img src="../sources/fotos_pelis/pulpfiction.jpg" alt="Imagen de la película" width="150"></td>
</td>
            <td><a href="<?php echo $dato['trailer']; ?>" target="_blank">Ver trailer</a></td>
        </tr>
        
        <tr>
            <td><?php echo $dato['nombre']; ?></td>
            <td><?php echo $dato['director']; ?></td>
            <td><?php echo $dato['genero']; ?></td>
            <td><?php echo $dato['ano']; ?></td>
            <td><?php echo $dato['duracion']; ?></td>
            <td><?php echo $dato['clasificacion']; ?></td>
            <td><?php echo $dato['pais']; ?></td>
            <td><?php echo $dato['sinopsis']; ?></td>
            <td><?php echo $dato['reparto']; ?></td>
            <td><img src="../sources/fotos_pelis/pulpfiction.jpg" alt="Imagen de la película" width="150"></td>
</td>
            <td><a href="<?php echo $dato['trailer']; ?>" target="_blank">Ver trailer</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
