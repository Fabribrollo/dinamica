<?php

$directorio = realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR . 'archivos' . DIRECTORY_SEPARATOR;

if ($_FILES['archivo']['error'] <= 0) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamano = $_FILES['archivo']['size'];
    $temporal = $_FILES['archivo']['tmp_name'];
    $extension = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

    // Validar tipo y tamaño
        $destino = $directorio . basename($nombre);
        if (move_uploaded_file($temporal, $destino)) {
            $mensaje = "Archivo guardado correctamente.<br>";
            $mensaje .= "<textarea>" . htmlspecialchars(file_get_contents($destino)) . "</textarea>";
        } else {
            $mensaje = "Error al guardar el archivo.<br>";
        }
    } 
    else {
    $mensaje = "Error: " . $_FILES['archivo']['error'] . "<br>";
}

///librerias
$autoload = '../vendor/autoload.php';
require_once $autoload;
use \ConvertApi\ConvertApi;

///se define el archivo a convertir y el directorio de salida
$inputFile = $directorio . basename($nombre);
$outputDirectorio = $directorio . 'resultados' . DIRECTORY_SEPARATOR;

///token api
ConvertApi::setApiCredentials('GUnOS96a6WrhH4bk7lNZkA3Fza7kHjAP');

///PDF a DOCX
if($tipo == 'application/pdf'){
    $conversion = 'docx';
    $resultado = ConvertApi::convert($conversion, [
        'File' => $inputFile,
    ], 'pdf'
);
}

///docx a PDF
elseif($tipo == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
    $conversion = 'pdf';
    $resultado = ConvertApi::convert($conversion, [
        'File' => $inputFile,
    ], 'docx'
);
}


///JPG/PNG/WEBP a PDF
elseif($tipo == "jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/webp"){
    $conversion = 'pdf';
    $resultado = ConvertApi::convert($conversion, [
        'File' => $inputFile,
    ], 'jpg'
);

}

///guarda el archivo convertido, devuelve valores a la vista.
$resultado->saveFiles($outputDirectorio);
$status = true;
$files = '../archivos\resultados' . DIRECTORY_SEPARATOR . basename($nombre, "." . $extension) . '.' . $conversion;

include("../vista/index.php");