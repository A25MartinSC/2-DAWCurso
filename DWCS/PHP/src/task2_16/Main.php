<?php
require_once("Operations.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students Management</title>
</head>

<body>
  <h1>Students Management</h1>
  <?php
  try {
    // Open the database connection
    $oper = new Operations();

    // Get a row from MyGuest table
    $resultado = $oper->getStudent(1);
    echo $resultado;

    //Add 
    echo "<h2>Add a student:</h2>";
    $student1 = new Student();
    $student1->setDni("12345678A");
    $student1->setName("Ana");
    $student1->setSurname("Ferradás");
    $student1->setAge(14);
    //$numberOfRows = $oper->addMyGuests($guest1);
    //if ($numberOfRows == 1) echo "<br>New guest added to the database";
    //else echo "<br>No guest has been added";

    //Update 
    echo "<h2>Update a student:</h2>";
    $student2 = new Student();
    $student2->setId(2);
    $student2->setDni("98675432B");
    $student2->setName("Luis");
    $student2->setSurname("Paz");
    $student2->setAge(24);
    $numberOfRows = $oper->updateStudent($student2);
    if ($numberOfRows == 1) echo "<br>Student modified to the database";
    else echo "<br>No student has been updated";

    //Delete
    $numberOfRows = $oper->deleteStudent(1);
    if ($numberOfRows == 1) echo "<br>Student deleted from the database";
    else echo "<br>No student has been deleted";

    // Get all rows from Student table
    echo "<h2>List of Student </h2>";
    $studentList = $oper->getAllStudent();
    foreach ($studentList as $student) {
      echo "<br>Guest: $student";
    }
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