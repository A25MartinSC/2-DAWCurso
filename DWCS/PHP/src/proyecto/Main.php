<?php
require_once("Operations.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Money Management</title>
</head>

<body>
  <h1>Money Management</h1>
  <?php
  try {
    // Open the database connection
    $oper = new Operations();

    $resultado = $oper->getMoney(1);
    echo $resultado;

    //Add 
    echo "<h2>Add a transaction:</h2>";
    $money1 = new Money();
    $money1->setConcept("Coffee");
    $money1->setAmount(1.60);
    $money1->setType("Expense");
    $money1->setDate("14-06-2026");
    $numberOfRows = $oper->addMoney($money1);
    if ($numberOfRows == 1) echo "<br>New transaction added to the database";
    else echo "<br>No transaction has been added";


    echo "<h2>List of Transactions </h2>";
    $moneyList = $oper->getAllMoney();
    foreach ($moneyList as $money) {
      echo "<br>Guest: $money";
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