<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre           = isset($_POST["nombre"])   ? $_POST["nombre"] : "";  
    $apellido         = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
    $libro            = isset($_POST["libro"])    ? $_POST["libro"] : "";
    $isbn             = isset($_POST["isbn"])     ? $_POST["isbn"] : "";
    $isbn_valid       = (!empty($isbn) && (strlen($isbn)== 13)) ? true : false;
    $email            = isset($_POST["email"])    ? $_POST["email"] : "";
    $email_valid      = filter_var($email, FILTER_VALIDATE_EMAIL);
    $fecha_alquiler   = isset($_POST["fecha_alquiler"]) ? $_POST["fecha_alquiler"] : "";
    if(!empty($fecha_alquiler)) {
        $fecha_devolucion = date('Y-m-d', strtotime($fecha_alquiler . ' + 10 days'));
        $fecha_actual     = date("Y-m-d");
        $fecha_en_rango   = strtotime($fecha_alquiler) >= strtotime($fecha_actual);
    }
    $dni              = isset($_POST["dni"]) ? $_POST["dni"] : "";
    if(preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)) {
        $numero       = substr($dni, 0, 8);
        $letra        = strtoupper(substr($dni, -1));
        $modulo       = $numero % 23;
        $letras_dni   = "TRWAGMYFPDXBNJZSQVHLCKE";
        if ($letra === $letras_dni[$modulo]) {
            $dni_valido = true;
        } else {
            $dni_correcto = substr($dni, 0, 8) . $letras_dni[$modulo];
        }
    }
    if (
        !empty($nombre)  &&
        !empty($apellido)&&
        !empty($libro) &&
        $isbn_valid == 1 &&
        !empty($email) &&
        !empty($email_valid) &&
        !empty($fecha_alquiler) &&
        $fecha_en_rango == 1 &&
        !empty($dni) && 
        $dni_valido == 1 
    ) {
        echo "<ul>";
        echo "<li><strong>Nombre:</strong> $nombre  $apellido </li>";
        echo "<li><strong>Fecha Devolución:</strong> $fecha_devolucion </li>";
        echo "<li><strong>DNI:</strong> $dni </li>";
        echo "</ul>";
    } else {
        echo "<ul>";
        if(empty($nombre)) {
            echo "<li><strong>Nombre:</strong> Debes introducir un nombre </li>";
        }
        if(empty($apellido)) {
            echo "<li><strong>Apellido:</strong> Debes introducir un apellido </li>";
        }
        if(empty($libro)) {
            echo "<li><strong>Libro Alquilado:</strong> Debes introducir un libro </li>";
        }
        if($isbn != 1) {
            echo "<li><strong>ISBN:</strong> Debes introducir un código ISBN válido de 13 caracteres numéricos </li>";
        }
        if(empty($email_valid)) {
            echo "<li><strong>Email:</strong> Debes introducir un email válido</li>"; 
        }
        if($fecha_en_rango != 1){
            echo "<li><strong>Fecha Alquiler:</strong> Debes seleccionar una fecha de alquiler igual o posterior al día de hoy $fecha_actual </li>";
        }
        if(!$dni_valido) {
            echo "<li><strong>DNI:</strong> Debes introducir un dni válido. Corrección:  $dni_correcto </li>";
        }
        echo "</ul>";
    }
}
?>