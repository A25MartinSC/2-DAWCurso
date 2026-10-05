<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Manage2 - Preloaded Form</title>
</head>

<body>
  <?php

  $options = [
    ["text" => "Java Programming", "value" => 0],
    ["text" => "Web Design", "value" => 1],
    ["text" => "Dockers administration", "value" => 2],
    ["text" => "Django framework", "value" => 3],
    ["text" => "Mongo database", "value" => 4],
  ];


  $name = isset($_COOKIE['name']) ? $_COOKIE['name'] : '';
  $selectedOption = isset($_COOKIE['opcion']) ? (int)$_COOKIE['opcion'] : 0;
  ?>

  <h1>Preloaded Form with Modality</h1>

  <form method="post" action="manage.php">

    <label for="idName">Name and surnames:</label>
    <input type="text" id="idName" name="name" value="<?php echo $name; ?>" required><br><br>

    <label for="idOpcion">Subject to enroll:</label>
    <select id="idOpcion" name="opcion">
      <?php foreach ($options as $item): ?>
        <option value="<?php echo $item['value']; ?>" <?php echo ($item['value'] === $selectedOption) ? 'selected' : ''; ?>>
          <?php echo $item['text']; ?>
        </option>
      <?php endforeach; ?>
    </select><br><br>

    <label>Class Modality:</label><br>
    <input type="radio" id="inPerson" name="modality" value="In-person classes" checked>
    <label for="inPerson">In-person classes</label><br>

    <input type="radio" id="distance" name="modality" value="Distance classes">
    <label for="distance">Distance classes</label><br><br>

    <input type="submit" value="Send data to manage11.php">
  </form>
</body>

</html>