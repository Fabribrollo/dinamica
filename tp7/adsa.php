<?php

$directorio = `D:\Users\Fabri\OneDrive\Desktop\tp7\archivos`;

if ($_FILES['archivo']['error'] <= 0) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamano = $_FILES['archivo']['size'];
    $temporal = $_FILES['archivo']['tmp_name'];
    $extension = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

    // Validar tipo y tamaño
    if (($extension === 'txt')) {
        $destino = $directorio . basename($nombre);
        if (move_uploaded_file($temporal, $destino)) {
            $mensaje = "Archivo guardado correctamente.<br>";
            $mensaje .= "<textarea" . file_get_contents($nombre) . "</textarea>";
        } else {
            $mensaje = "Error al guardar el archivo.<br>";
        }
    } else {
        $mensaje = "Error: Solo se permiten archivos .doc, .docx o .pdf y de hasta 2 MB.<br>";
    }
} else {
    $mensaje = "Error: " . $_FILES['archivo']['error'] . "<br>";
}

include("../index.html");



use \ConvertApi\ConvertApi;

ConvertApi::setApiCredentials('GUnOS96a6WrhH4bk7lNZkA3Fza7kHjAP');
$resultado = ConvertApi::convert('docx', [
        'File' => '/archivos/ejemplo.docx',
    ], 'pdf'
);

$resultado->saveFiles('/archivos/resultados');

?>