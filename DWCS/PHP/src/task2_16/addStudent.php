<?php
require_once "Operations.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"] ?? "";
  $surname = $_POST["surname"] ?? "";
  $dni = $_POST["dni"] ?? "";
  $age = $_POST["age"] ?? 0;

  $student = new Student();
  $student->setName($name);
  $student->setSurname($surname);
  $student->setDni($dni);
  $student->setAge((int)$age);

  try {
    $oper = new Operations();
    $oper->addStudent($student);
    $oper->closeConnection();
  } catch (Exception $e) {
  }


  header("Location: index.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  * {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    box-sizing: border-box;

  }

  body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0;
    margin-top: 100px;
    background-color: #d1e6f7;
  }

  .form {
    padding: 70px;
    background-color: #ffffff;
    border-radius: 10px;
  }

  .boton1 {
    margin-top: 15px;
    background-color: #82d8e7;
    padding: 15px 80px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }
</style>

<body>
  <div class="form">
    <h1>Add Student</h1>
    <form action="" method="POST">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name" required><br><br>

      <label for="surname">Surname:</label><br>
      <input type="text" id="surname" name="surname" required><br><br>

      <label for="dni">Dni:</label><br>
      <input type="text" id="dni" name="dni" required><br><br>

      <label for="age">Age:</label><br>
      <input type="number" id="age" name="age" required><br><br>

      <input class="boton1" type="submit" value="Add">
    </form>
  </div>
</body>

</html>