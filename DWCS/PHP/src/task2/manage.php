<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Manage Enrollment</title>
</head>

<body>
  <?php
  $subjects = [
    0 => "Java Programming",
    1 => "Web Design",
    2 => "Dockers administration",
    3 => "Django framework",
    4 => "Mongo database"
  ];


  $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
  $opcionVal = isset($_POST['opcion']) ? (int)$_POST['opcion'] : 0;
  $modality = isset($_POST['modality']) ? htmlspecialchars($_POST['modality']) : '';

  $subjectName = isset($subjects[$opcionVal]) ? $subjects[$opcionVal] : 'Unknown';
  ?>

  <h1>Confirmation</h1>


  <p><?php echo $name; ?> wants to enrol in the following subject: <?php echo $subjectName; ?></p>

  <?php if (!empty($modality)): ?>
    <p>Modality selected: <strong><?php echo $modality; ?></strong></p>
  <?php endif; ?>

  <hr>

  <form action="manage2.php" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="opcion" value="<?php echo $opcionVal; ?>">
    <button type="submit">Go to next page</button>
  </form>
</body>

</html>