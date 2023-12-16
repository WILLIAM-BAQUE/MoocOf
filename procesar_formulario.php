<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardamos la imagen si se ha subido
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $directorio_subida = 'carpeta_imagenes/';
        $nombre_imagen = $_FILES['imagen']['name'];
        $ruta_imagen = $directorio_subida . $nombre_imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen);
    } else {
        // Manejar errores si no se sube la imagen
        $ruta_imagen = ''; // O establecer una ruta por defecto
    }

    // Obtener datos del formulario
    $nombre_curso = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $enlace_curso = $_POST['link'] ?? '';

    // Datos a enviar a Firebase
    $data = [
        'nombre' => $nombre_curso,
        'descripcion' => $descripcion,
        'link' => $enlace_curso,
        'imagen' => $ruta_imagen // Agregar la ruta de la imagen a los datos enviados a Firebase
    ];

    // URL de la base de datos en Firebase
    $firebase_url = 'gs://mooc-cursos.appspot.com'; // Reemplaza con la URL correcta

    // Enviar los datos a Firebase
    $ch = curl_init($firebase_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Ejecutar la petición y obtener la respuesta
    $response = curl_exec($ch);

    if ($response === false) {
        // Manejar el error si la solicitud falla
        echo 'Error en la solicitud a Firebase: ' . curl_error($ch);
    } else {
        // Si la solicitud fue exitosa, redirigir o mostrar un mensaje de éxito
        header('Location: paginados.html'); // Redirigir a una página de éxito
        exit;
    }

    // Cerrar la conexión cURL
    curl_close($ch);
}
?>