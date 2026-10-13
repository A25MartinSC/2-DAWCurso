<?php
require("ExPropia.php");

class ExPropiaClass
{
  public static function testNumber($num)
  {
    if ($num == 0) {
      throw new ExPropia("<br> El numero no puede ser cero");
    } else {
      echo "<br> Numero valido: " . $num;
    }
  }
}
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
  try {


    echo "<br>Proba 1:";
    ExPropiaClass::testNumber(0);
  } catch (ExPropia $erro) {
    echo $erro->getMessage();
  }
  ?>
</body>

</html>