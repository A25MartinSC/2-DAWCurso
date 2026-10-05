<?php
class Calculator
{
  private $num1;
  private $num2;


  public function __construct($num1 = 0, $num2 = 0)
  {
    $this->num1 = $num1;
    $this->num2 = $num2;
  }


  public function getNum1()
  {
    return $this->num1;
  }

  public function setNum1($num1)
  {
    $this->num1 = $num1;
  }

  public function getNum2()
  {
    return $this->num2;
  }

  public function setNum2($num2)
  {
    $this->num2 = $num2;

    return $this;
  }


  function __multiply($num1, $num2)
  {
    return $num1 * $num2;
  }
  function __add($num1, $num2)
  {
    return "num1 = " . $this->num1 . ", num2 = " . $this->num2;
  }
} //class
$apple = new Fruit("apple", "green");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  echo $apple;
  $apple->setColor("red");
  echo "<br><br>";
  echo $apple->getColor();
  ?>
</body>

</html>