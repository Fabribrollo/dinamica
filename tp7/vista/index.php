<!DOCTYPE html>
<?php include_once("css/estructura/header.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="text-center">

    <div class="d-flex flex-column align-items-center justify-content-center w-100">
    <h1>Conversor</h1>
        <div class="nav nav-pills mb-4">
            <li class="nav-item bg-light border p-2"><a class="nav-link" href="/tp7/vista/pdfadocx.php">PDF → DOCX</a></li>
            <li class="nav-item bg-light border p-2"><a class="nav-link" href="/tp7/vista/docxapdf.php">DOCX → PDF</a></li>
            <li class="nav-item bg-light border p-2"><a class="nav-link" href="/tp7/vista/imgapdf.php">IMAGEN → PDF</a></li>
        </div>
    </div>



        <?php 
        if (isset($status)) {
            if ($status === true) {
        echo '<p style="color:green">Archivo convertido: <a href="'.htmlspecialchars($files).'" download>Descargar</a></p>';
        } else {
        echo '<p style="color:red">Error al convertir el archivo.</p>';
        }
}
        ?>
<?php include_once("css/estructura/footer.php"); ?>
</body>
</html>
