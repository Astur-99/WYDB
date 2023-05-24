<?php
// Validamos datos del servidor
$user = "root";
$pass = "pogagu22";
$host = "11.11.11.200";

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
    echo "<b><h3>Dirección de conexión: $host </h3><b>";
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

// Comprobamos si el nombre de usuario ya existe
$query = "SELECT * FROM usuarios WHERE nombre = '$username'";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    die("ERROR# Este nombre de usuario ya está en uso, por favor, retroceda y utilice otro, gracias.");
}

// Comprobamos si el correo electrónico ya está registrado
$query = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    die("ERROR# Este correo electrónico ya se ha registrado, por favor, retroceda y utilice otro, gracias.");
}

// Realizamos la inserción en la tabla de la BBDD
$instruccion_SQL = "INSERT INTO usuarios (nombre, contrasena, email) VALUES ('$username', '$password', '$email')";

$resultado = mysqli_query($connection, $instruccion_SQL);

if (!$resultado) {
    die("Error al insertar los datos: " . mysqli_error($connection));
} else {
    // Redireccionar a "welcome.html"
    header("Location: welcome.php");
    exit(); // Asegurarse de que el script se detenga después de la redirección
}

// Cerramos la conexión
mysqli_close($connection);
?>

