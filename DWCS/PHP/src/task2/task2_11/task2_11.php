<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $opciones = [
    "java" => ["text" => "Java Programming", "value" => 0],
    "web" => ["text" => "Web Design", "value" => 1],
    "docker" => ["text" => "Dockers administration", "value" => 2],
    "django" => ["text" => "Django framework", "value" => 3],
    "mongo" => ["text" => "Mongo Database", "value" => 4],
  ];

  $errorName = "";
  $name = "";


  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';

    if (empty($name)) {
      $errorName = "*Campo Obligatorio";
    }
  }
  ?>

  <h1>First practice using forms.</h1>


  <form action="manage11.php" method="post">
    <label for="idName">Name and surnames:</label>
    <input type="text" id="idName" name="name" value="<?php echo htmlspecialchars($name); ?>">

    <?php if (!empty($errorName)): ?>
      <span style="color: red;"><?php echo $errorName; ?></span>
    <?php endif; ?>

    <br><br>

    <label for="idOpcion">Subject to enroll:</label>
    <select id="idOpcion" name="opcion">
      <option value="default" selected disabled>Select Option</option>
      <?php foreach ($opciones as $key => $item): ?>
        <option value="<?php echo $item['value']; ?>">
          <?php echo $item['text']; ?>
        </option>
      <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Send data">
  </form>
</body>

</html>