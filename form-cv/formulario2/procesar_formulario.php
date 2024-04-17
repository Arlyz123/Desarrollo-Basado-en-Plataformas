<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $server = "localhost";
    $user = "root";
    $pass = "7653";
    $db = "form-cv";

    $conn = new mysqli($server, $user, $pass, $db);

    // verifica conexion
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre_apellidos = $conn->real_escape_string($_POST["nombre"]);
    $fecha_nacimiento = $conn->real_escape_string($_POST["fecha_nacimiento"]);
    $ocupacion = $conn->real_escape_string($_POST["ocupacion"]);
    $telefono = $conn->real_escape_string($_POST["telefono"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $linkedin = $conn->real_escape_string($_POST["linkedin"]);
    $direccion = $conn->real_escape_string($_POST["direccion"]);
    $nacionalidad = $conn->real_escape_string($_POST["nacionalidad"]);
    $nivel_ingles = $conn->real_escape_string($_POST["nivel_ingles"]);
    $lenguajes_programacion = implode(", ", $_POST["lenguajes_programacion"]);
    $aptitudes = $conn->real_escape_string($_POST["aptitudes"]);
    $habilidades = implode(", ", $_POST["habilidades"]);
    $perfil = $conn->real_escape_string($_POST["perfil"]);
    $experiencia_laboral = $conn->real_escape_string($_POST["experiencia_laboral"]);
    $formacion_secundaria = $conn->real_escape_string($_POST["formacion_secundaria"]);
    $formacion_superior = $conn->real_escape_string($_POST["formacion_superior"]);

    // consulta SQL para insertar los datos
    $sql = "INSERT INTO curriculum (nombre_apellidos, fecha_nacimiento, ocupacion, telefono, email, linkedin, direccion, nacionalidad, nivel_ingles, lenguajes_programacion, aptitudes, habilidades, perfil, experiencia_laboral, formacion_secundaria, formacion_superior) 
    VALUES ('$nombre_apellidos', '$fecha_nacimiento', '$ocupacion', '$telefono', '$email', '$linkedin', '$direccion', '$nacionalidad', '$nivel_ingles', '$lenguajes_programacion', '$aptitudes', '$habilidades', '$perfil', '$experiencia_laboral', '$formacion_secundaria', '$formacion_superior')";

    //sql
    if ($conn->query($sql) === TRUE) {
        // guardar los datos en sesion
        $_SESSION['nombre_apellidos'] = $nombre_apellidos;
        $_SESSION['ocupacion'] = $ocupacion;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['email'] = $email;
        $_SESSION['linkedin'] = $linkedin;
        $_SESSION['direccion'] = $direccion;
        $_SESSION['nivel_ingles'] = $nivel_ingles;
        $_SESSION['aptitudes'] = $aptitudes;
        $_SESSION['habilidades'] = $habilidades;
        $_SESSION['perfil'] = $perfil;
        $_SESSION['experiencia_laboral'] = $experiencia_laboral;
        $_SESSION['formacion_secundaria'] = $formacion_secundaria;
        $_SESSION['formacion_superior'] = $formacion_superior;

        $conn->close();
        
        // manda a la pagina de curriculum (todo es codigo es como el de la primera tarea)
        header("Location: nuevo.php");
        exit();
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: El formulario no fue enviado correctamente";
}
?>