<!DOCTYPE html>
<?php include_once("css/estructura/header.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="text-center">

    <h1>Convertir JPG/JPEG/PNG/WEBP a PDF</h1>
    <form action="../control/controlador.php" method="post" enctype="multipart/form-data" class="card p-3 shadow-sm w-100" style="max-width:540px;margin:auto;">
  <div class="mb-3">
    <label for="archivo" class="form-label fw-semibold">Seleccionar archivo de imagen</label>
    <input class="form-control form-control-lg " type="file" id="archivo" name="archivo" accept=".jpg,.jpeg,.png,.webp" required>

  </div>

  <div class="d-flex gap-2 justify-content-center flex-column">
    <button type="submit" class="btn btn-primary">
      Enviar
    </button>
    <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
  </div>
</form>


</body>
</html>
