<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Example Page</title>
</head>

<body>
  <?php

  function mostrarPersona(?string $nombre, string $apellido = "Apelido", int $edad): void
  {
    echo "<b>$nombre $apellido tiene $edad años.</b>";
  }

  mostrarPersona("Juan", "Perez", 25);
  ?>

</body>

</html>