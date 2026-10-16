<?php
require_once "Operations.php";

$oper = new Operations();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $student = new Student();
  $student->setId($_POST["id"]);
  $student->setName($_POST["name"]);
  $student->setSurname($_POST["surname"]);
  $student->setDni($_POST["dni"]);
  $student->setAge((int)$_POST["age"]);

  $oper->updateStudent($student);
  $oper->closeConnection();

  header("Location: index.php");
  exit();
}

$id = $_GET['id'] ?? null;
if (!$id) {
  header("Location: index.php");
  exit();
}

$student = $oper->getStudent($id);
$oper->closeConnection();

if (!$student) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
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

    .form {
      padding: 70px;
      background-color: #ffffff;
      border-radius: 10px;
    }

    .boton1 {
      margin-top: 15px;
      background-color: #4CAF50;
      color: white;
      padding: 15px 80px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="form">
    <h1>Edit Student</h1>
    <form action="" method="POST">

      <input type="hidden" name="id" value="<?php echo $student->getId(); ?>">

      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($student->getName()); ?>" required><br><br>

      <label for="surname">Surname:</label><br>
      <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($student->getSurname()); ?>" required><br><br>

      <label for="dni">Dni:</label><br>
      <input type="text" id="dni" name="dni" value="<?php echo htmlspecialchars($student->getDni()); ?>" required><br><br>

      <label for="age">Age:</label><br>
      <input type="number" id="age" name="age" value="<?php echo $student->getAge(); ?>" required><br><br>

      <input class="boton1" type="submit" value="Update">
    </form>
  </div>
</body>

</html>