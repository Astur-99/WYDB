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
$query = "SELECT nombre, director, genero, ano, duracion, clasificacion, pais, sinopsis, reparto, imagen, trailer FROM peliculas WHERE nombre LIKE 'Jackass Forever'";
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Info</title>
    <style>
    
        h1 {
          text-align: center;
          color: white;
        }
        
        body {
          font-family: Arial, sans-serif;
          margin: 20px;
          background-image: url('../../sources/welcome_background.jpg');
          background-size: cover;
          background-position: center;
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
            background-color: rgba(242, 242, 242, 0.7);
        }


        th {
            background-color: #4CAF50;
            color: white;
        }

        .image-container {
            position: relative;
            display: block;
            text-align: center;
        }

        .video-container {
            text-align: center;
            margin-top: 20px;
        }

        
    </style>
</head>
<body>
    <h1>Informacion de la pelicula.</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Director</th>
            <th>Genero</th>
            <th>Fecha de salida</th>
            <th>Duracion</th>
            <th>Clasificacion</th>
            <th>Pais</th>
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
            <td><img src="../../sources/fotos_pelis/JACKASS_FOREVER.jpg" alt="Imagen de la película" width="150"></td>
</td>
            <td><a href="<?php echo $dato['trailer']; ?>" target="_blank">Ver trailer</a></td>
        </tr>        
        <?php endforeach; ?>
    </table>

    <div class="video-container">
        <video controls width="640" height="360">
            <source src="../../pelis/JACKASS_FOREVER.mp4" type="video/mp4">
            Tu navegador no soporta el elemento de video.
        </video>
    </div>
    
</body>
</html>
