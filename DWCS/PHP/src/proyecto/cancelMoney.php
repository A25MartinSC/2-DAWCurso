<?php
require_once "Operations.php";

$id = $_GET['id'] ?? null;

if (!$id) {
  header("Location: index.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $oper = new Operations();
  $oper->deleteMoney($id);
  $oper->closeConnection();

  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Cancel transaction</title>
  <link rel="stylesheet" href="cancel.css">
</head>

<body>
  <div class="botones">
    <h1>Are you sure you want to cancel this transaction?</h1>

    <form action="" method="POST">
      <input type="submit" class="boton1" value="Yes,cancel">
    </form>
    <a href="index.php" class="boton2">No</a>
  </div>
</body>

</html>