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
  }


  public function multiply()
  {
    return $this->num1 * $this->num2;
  }

  public function add()
  {
    return $this->num1 + $this->num2;
  }


  public function __toString()
  {
    return "num1 = " . $this->num1 . ", num2 = " . $this->num2;
  }
}

$firstCalcule = new Calculator();
$firstCalcule->setNum1(10);
$firstCalcule->setNum2(5);

echo "First Calcule: " . $firstCalcule->getNum1() . " y " . $firstCalcule->getNum2() . "<br>";


$secondCalcule = new Calculator(20, 4);

echo "Second Calcule: " . $secondCalcule . "<br>";
echo "Multiplication: " . $secondCalcule->multiply() . "<br>";
echo "Addition: " . $secondCalcule->add() . "<br>";
?>