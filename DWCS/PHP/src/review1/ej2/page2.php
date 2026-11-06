<?php
$name = $_POST["name"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page2</title>
</head>

<body>

  <h2>Information received</h2>
  <p>Name: <?php echo $name; ?></p>


  </body>
  <a href="page3.php?name=<?php echo $name ?>"> Third Page </a>

</html>
