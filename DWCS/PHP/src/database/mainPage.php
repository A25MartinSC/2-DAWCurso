<?php
require_once("Operations.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGuests Management</title>
</head>

<body>
  <h1>MyGuests Management</h1>
  <?php
  try {
    //Open the database connection
    $oper = new Operations();
    $resultado = $oper->getMyGuest(1);
    echo $resultado;

    //Get all rows from myGuests table
    echo "<h2>List of my Guest</h2>";
    $guestList = $oper->getAllMyGuest();
    foreach ($guestList as $guest) {
      echo "<br>Guest: $guest";
    }

    //ADD
    $guest1 = new MyGuests();
  } catch (PDOException $e) {
    echo "<br><p style='color:red;'>DB Error: " . $e->getMessage() . "</p><br>";
  } catch (Exception $e) {
    echo "<br><p style='color:red;'>Error: " . $e->getMessage() . "</p><br>";
  } finally {
    //Close connection
    $oper->closeConnection();
  }
  ?>
</body>

</html>