<?php
// Datos de conexión a la base de datos PostgreSQL
$host = 'mail.tecnoweb.org.bo';
$port = '5432';
$dbname = 'db_grupo09sa';
$user = 'grupo09sa';
$password = 'grup009grup009';

// Obtener los datos del formulario
$nombre = $_POST['name'];
$correo = $_POST['email'];
$cel = $_POST['phone'];
$sms = $_POST['message'];


echo $_POST;

// Establecer la conexión a la base de datos PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

// Crear la consulta SQL para insertar los datos en la tabla
//INSERT INTO public.cotacto( id, nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?, ?);
$sql = "INSERT INTO cotacto ( nombre, email, telefono, mensaje ) VALUES ('$nombre', '$correo', '$cel', '$sms')";

// Ejecutar la consulta
$result = pg_query($conn, $sql);

if ($result) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . pg_last_error($conn);
}

// Cerrar la conexión
pg_close($conn);
?>
