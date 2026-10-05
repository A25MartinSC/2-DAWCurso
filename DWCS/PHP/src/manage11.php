<?php

$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$opcionVal = isset($_POST['opcion']) ? (int)$_POST['opcion'] : 0;

setcookie("name", $name, time() + 3600);
setcookie("opcion", $opcionVal, time() + 3600);

$subjects = [
  0 => "Java Programming",
  1 => "Web Design",
  2 => "Dockers administration",
  3 => "Django framework",
  4 => "Mongo database"
];

$modality = isset($_POST['modality']) ? htmlspecialchars($_POST['modality']) : '';
$subjectName = isset($subjects[$opcionVal]) ? $subjects[$opcionVal] : 'Unknown';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Manage Enrollment</title>
</head>

<body>
  <h1>Confirmation</h1>

  <p><?php echo $name; ?> wants to enrol in the following subject: <?php echo $subjectName; ?></p>

  <?php if (!empty($modality)): ?>
    <p>Modality selected: <strong><?php echo $modality; ?></strong></p>
  <?php endif; ?>

  <hr>

  <a href="manage112.php"> Third Page </a>
</body>

</html>