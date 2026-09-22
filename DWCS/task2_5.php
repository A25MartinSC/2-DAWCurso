<!DOCTYPE html>
<html lang="en">
<?php
function tripleCheck(array $numbers): bool
{
  $contador = 0;
  $triple = false;
  $anterior = "";
  foreach ($numbers as $num) { //para cada elemento del array
    if ($num == $anterior) $contador++;
    else $contador  = 0;
    if ($contador  == 2) {
      $triple = true;
      break;
    }
    $anterior = $num;
  }
  return $triple;
}

//funcion amosar pais e capital
function paisCapital(array $Apais)
{
  foreach ($Apais as $pais => $capital) {
    echo "The capital of " . $pais . " is " . $capital . "<br><br>";
  }
}

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Probando Arrays</h1>
  <?php
  echo "<p>Caso 1</p>";
  $caso1 = array(1, 1, 1, 4, 5);
  if (tripleCheck($caso1))
    echo "No terceiro caso hai un triplecheck";
  else {
    echo "Non hai un triplecheck";
  }

  echo "<p>Caso 2</p>";
  $caso2 = array(1, 2, 1, 1, 5);
  if (tripleCheck($caso2))
    echo "<br>No terceiro caso hai un triplecheck";
  else {
    echo "Non hai un triplecheck";
  }

  echo "<p>Caso 3</p>";
  $caso3 = array(1, 2, 5, 5, 5);
  if (tripleCheck($caso3))
    echo "No terceiro caso hai un triplecheck";
  else {
    echo "Non hai un triplecheck";
  }

  //EJ 2
  echo "<br><br>================EJERCICIO 2================ <br><br>";

  $Apais = array("Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels", "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris", "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands" => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid", "Sweden" => "Stockholm", "United Kingdom" => "London", "Cyprus" => "Nicosia", "Lithuania" => "Vilnius", "Czech Republic" => "Prague", "Estonia" => "Tallin", "Hungary" => "Budapest", "Latvia" => "Riga", "Malta" => "Valetta", "Austria" => "Vienna", "Poland" => "Warsaw");

  paisCapital($Apais);
  ?>
</body>

</html>