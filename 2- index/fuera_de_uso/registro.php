<?php
// Validamos datos del servidor
$user = "root";
$pass = "pogagu22";
$host = "localhost";

// Conectamos a la BBDD
$connection = mysqli_connect($host, $user, $pass);

// Cogemos datos del formulario
if (isset($_POST['username_reg'])) {
    $username = $_POST["username_reg"];
    $email = $_POST["email_reg"];
    $password = $_POST["password_reg"];
}

// Verificamos la conexión a la BBDD
if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
} else {
    echo "<b><h3>Servidor conectado</h3><b>";
}

// Indicamos el nombre de la BBDD
$db_name = "wydb";

// Seleccionamos la BBDD
$db_selected = mysqli_select_db($connection, $db_name);

if (!$db_selected) {
    die("No se ha podido encontrar la base de datos: " . mysqli_error($connection));
} else {
    echo "<h3>Base de datos seleccionada:</h3>";
}

// Realizamos la inserción en la tabla de la BBDD
$instruccion_SQL = "INSERT INTO usuarios (nombre, contrasena, email) VALUES ('$username', '$password', '$email')";

$resultado = mysqli_query($connection, $instruccion_SQL);

if (!$resultado) {
    die("Error al insertar los datos: " . mysqli_error($connection));
} else {
    echo "Datos insertados correctamente.";
}

// Cerramos la conexión
mysqli_close($connection);
?>
