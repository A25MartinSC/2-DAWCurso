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
    // Open the database connection
    $oper = new Operations();

    // Get a row from MyGuest table
    $resultado = $oper->getMyGuest(1);
    echo $resultado;

    // Get all rows from MyGuest table
    echo "<h2>List of MyGuest </h2>";
    $guestList = $oper->getAllMyGuest();
    foreach ($guestList as $guest) {
      echo "<br>Guest: $guest";
    }

    //Add 
    echo "<h2>Add a guest:</h2>";
    $guest1 = new MyGuests();
    $guest1->setFirstName("Laura");
    $guest1->setLastName("Gonzalez");
    $guest1->setEmail("laura@gonzalez.es");
    $guest1->setReg_date("2000-11-23");
    $numberOfRows = $oper->addMyGuests($guest1);
    if ($numberOfRows == 1) echo "<br>New guest added to the database";
    else echo "<br>No guest has been added";
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