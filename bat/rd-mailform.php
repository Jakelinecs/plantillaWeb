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
$sql = "INSERT INTO cotacto (nombre, email, telefono, mensaje) VALUES ($1, $2, $3, $4)";

// Preparar la consulta
$stmt = pg_prepare($conn, "insert_query", $sql);

// Ejecutar la consulta con los valores proporcionados
$result = pg_execute($conn, "insert_query", array($nombre, $correo, $cel, $sms));

if ($result) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . pg_last_error($conn);
}

// Cerrar la conexión
pg_close($conn);
?>
