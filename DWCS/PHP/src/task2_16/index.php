<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
</head>
<style>
  * {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    box-sizing: border-box;

  }

  body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0;
    margin-top: 100px;
    background-color: #d9e8f5;
  }

  .table {
    padding: 70px;
    background-color: #ffffff;
    border-radius: 10px;
  }

  table,
  td,
  th {
    border: 1px solid #acd2e2;
    padding: 10px;
    margin-top: 50px;
  }

  table {
    border-collapse: collapse;
    text-align: center;
  }


  .boton1,
  .boton2 {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    min-height: 32px;
  }

  .boton1 {
    background-color: #70bcdd;
  }

  .boton2 {
    background-color: #386579;
    font-weight: bold;
    text-decoration: none;
    color: black;
  }

  .boton1 img {
    width: 16px;
    height: 16px;
    object-fit: contain;
  }

  .boton3 {
    font-style: none;
    margin-top: 15px;
    background-color: #acd2e2;
    padding: 18px 45px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  th {
    background-color: #acd2e2;
  }
</style>

<body>
  <div class="table">
    <h1>Student Management</h1>
    <table>
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Dni</th>
        <th>Age</th>
        <th>Edit</th>
        <th>Delete</th>
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


        echo "<td>";
        echo "<a href='editStudent.php?id=" . $student->getId() . "' class='boton1'><img src='img/84259.png' alt='Edit'></a>";
        echo "</td>";


        echo "<td>";
        echo "<a href='deleteStudent.php?id=" . $student->getId() . "' class='boton2'>X</a>";
        echo "</td>";

        echo "</tr>";
      }
      ?>
    </table>
  </div>
  <a href="addStudent.php">
    <button class="boton3">Add Student</button>
  </a>
</body>

</html>