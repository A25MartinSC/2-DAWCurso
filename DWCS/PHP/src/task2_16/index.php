<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
</head>

<body>
  <h1>Student Management</h1>
  <table>
    <tr>
      <th>Name</th>
      <th>Surname</th>
      <th>Dni</th>
      <th>Age</th>
    </tr>
    <?php
    require_once 'Operations.php';
    $oper = new Operations();
    $StudentList = $oper->getAllStudent();
    foreach ($StudentList as $student) {
      echo "<tr>";
      echo "<td>" . $student->getName() . "</td>";
      echo "<td>" . $student->getSurname() . "</td>";
      echo "<td>" . $student->getDni() . "</td>";
      echo "<td>" . $student->getAge() . "</td>";
      echo "</tr>";
    }
    ?>

  </table>
</body>

</html>