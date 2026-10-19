<?php
require_once "Operations.php";

$id = $_GET['id'] ?? null;

if (!$id) {
  header("Location: index.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $oper = new Operations();
  $oper->deleteStudent($id);
  $oper->closeConnection();

  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Delete</title>
  <style>
    * {
      font-family: 'Trebuchet MS', Arial, sans-serif;
      box-sizing: border-box;
    }

    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 100px;
      background-color: #d1e6f7;
    }

    .botones {
      padding: 70px;
      background-color: #ffffff;
      border-radius: 10px;
    }

    .boton1 {
      font-weight: bold;
      background-color: #f12525;
      color: black;
      padding: 15px 40px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      margin-left: 70px;
    }

    .boton2 {
      display: inline-block;
      font-weight: bold;
      background-color: #82d8e7;
      color: black;
      padding: 15px 40px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      text-decoration: none;
      margin-left: 180px;
    }

    form {
      display: inline-block;
    }
  </style>
</head>

<body>
  <div class="botones">
    <h1>Are you sure you want to delete this student?</h1>

    <form action="" method="POST">
      <input type="submit" class="boton1" value="Yes, delete">
    </form>
    <a href="index.php" class="boton2">Cancel</a>
  </div>
</body>

</html>