<?php
  // Comprobar si se ha enviado el formulario
  if (isset($_FILES['file'])) {
    // Obtener el nombre original del archivo
    $originalFilename = $_FILES['file']['name'];

	  
$path = pathinfo($originalFilename, PATHINFO_EXTENSION);
    // Generar un nuevo nombre para el archivo
    $newFilename = "mi-archivo-" . time() . ".$path";

    // Mover el archivo a la carpeta de destino
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $newFilename);
  }
?>

<!-- Formulario para subir el archivo -->
<form method="post" enctype="multipart/form-data">
  <input type="file" name="file" />
  <input type="submit" value="Subir archivo" />
</form>
