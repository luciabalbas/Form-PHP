<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica PHP</title>
    <meta name="author" content="Lucia Balbas" />
    <meta name="description" content="Pagina de formulario de registro para la practica de PHP" />
    <!-- Link para vincular estilo -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
    <?php
    // Valores del formulario
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    
    // Conexion con BBDD
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "practicaphp";
    
    
    // Crear conexion con BBDD
    $conn = new mysqli($serverName, $username, $password, $dbname);
    
    // Comprobar si la conexion se establece
    if ($conn->connect_error) {
        echo "<p>La conexión falló</p>";
        die("La conexión falló: " . $conn->connect_error);
    }
    
    // Se crea la querie con los valores a introducir en la tabla
    $sql = "INSERT INTO usuarios (nombre, apellido, email)
    VALUES ('$name', '$surname', '$email')";
    
    // Si el querie se realiza correctamente -> se imprimen los datos introducidos
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Se registró correctamente</h1>";
        echo '<div class="datos">';
        echo "<p><strong>Nombre: </strong>" . $name . "</p>";
        echo "<p><strong>Apelido: </strong>" . $surname . "</p>";
        echo "<p><strong>Email: </strong>" . $email . "</p>";
        echo '</div>';
    } else {
        echo "Error " . $sql . "<br>" . $conn->error;
    }
    
    // cierre de la conexion a la BBDD
    $conn->close();
    ?>

    </main>
</body>
</html>