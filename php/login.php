<?php
// Validamos datos del servidor
$user = "root";
$pass = "pogagu22";
$host = "11.11.11.200";

// Conectamos a la BBDD
$connection = mysqli_connect($host, $user, $pass);

// Cogemos datos del formulario
if (isset($_POST['email_log']) && isset($_POST['password_log'])) {
    $email = $_POST["email_log"];
    $password = $_POST["password_log"];
} else {
    die("Por favor, ingresa tanto el correo electrónico como la contraseña.");
}

// Verificamos la conexión a la BBDD
if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
} else {
    echo "<b><h3>Servidor conectado</h3></b>";
    echo "<b><h3>Dirección de conexión: $host </h3></b>";
}

// Indicamos el nombre de la BBDD
$db_name = "wydb";

// Seleccionamos la BBDD
$db_selected = mysqli_select_db($connection, $db_name);

if (!$db_selected) {
    die("No se ha podido encontrar la base de datos: " . mysqli_error($connection));
} else {
    echo "<h3>Base de datos seleccionada: $db_name </h3>";
}

// Comprobamos si el correo electrónico y contraseña coinciden
$query = "SELECT * FROM usuarios WHERE email = '$email' AND contrasena = '$password'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error al realizar la consulta: " . mysqli_error($connection));
}

if (mysqli_num_rows($result) > 0) {
    // Inicio de sesión exitoso
    echo "¡Inicio de sesión exitoso!";
    header("Location: welcome.php");
} else {
    // Credenciales incorrectas
    echo "ERROR# Las credenciales de inicio de sesión son incorrectas.";
}

// Cerramos la conexión
mysqli_close($connection);
?>
