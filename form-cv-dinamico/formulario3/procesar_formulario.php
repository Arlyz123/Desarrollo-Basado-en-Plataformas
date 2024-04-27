<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $server = "localhost";
    $username = "root";
    $password = "7653";
    $database = "form-cv-dinamica";

    // Crear conexión
    $conn = new mysqli($server, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Capturar datos del formulario
    $nombre_apellidos = $_POST["nombre"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $nacionalidad = $_POST["nacionalidad"];
    $idiomas = $_POST["idiomas"];
    $niveles = $_POST["niveles"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $linkedin = $_POST["linkedin"];
    $lenguajes_programacion = isset($_POST["lenguajes_programacion"]) ? $_POST["lenguajes_programacion"] : [];
    $habilidades = isset($_POST["habilidades"]) ? $_POST["habilidades"] : [];
    $experiencia_laboral = $_POST["experiencia_laboral"];
    $formacion_secundaria = $_POST["formacion_secundaria"];
    $formacion_superior = $_POST["formacion_superior"];

    // Combinar idiomas y niveles en un solo string
    $idiomas_niveles = [];
    for ($i = 0; $i < count($idiomas); $i++) {
        $idioma = $idiomas[$i];
        $nivel = $niveles[$i];
        $idiomas_niveles[] = "$idioma-$nivel";
    }
    $idiomas_niveles_str = implode(", ", $idiomas_niveles);

    // Consulta SQL para insertar los datos
    $sql = "INSERT INTO curriculum (nombre_apellidos, fecha_nacimiento, nacionalidad, idiomas_niveles, telefono, email, linkedin, lenguajes_programacion, habilidades, experiencia_laboral, formacion_secundaria, formacion_superior) 
            VALUES ('$nombre_apellidos', '$fecha_nacimiento', '$nacionalidad', '$idiomas_niveles_str', '$telefono', '$email', '$linkedin', '" . implode(", ", $lenguajes_programacion) . "', '" . implode(", ", $habilidades) . "', '$experiencia_laboral', '$formacion_secundaria', '$formacion_superior')";

    // Ejecutar consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Guardar datos en sesión
        $_SESSION['nombre_apellidos'] = $nombre_apellidos;
        $_SESSION['nacionalidad'] = $nacionalidad;
        $_SESSION['idiomas'] = $idiomas_niveles;
        $_SESSION['lenguajes_programacion'] = $lenguajes_programacion;
        $_SESSION['habilidades'] = $habilidades;
        $_SESSION['experiencia_laboral'] = $experiencia_laboral;
        $_SESSION['formacion_secundaria'] = $formacion_secundaria;
        $_SESSION['formacion_superior'] = $formacion_superior;

        $conn->close();

        // Redirigir a la página de confirmación
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
