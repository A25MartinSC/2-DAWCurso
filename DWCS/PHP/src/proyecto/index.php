<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Piggy Bank</title>
</head>

<body>
  <div class="header">
    <img src="img/Group 3.png">
    <h1>Piggy Bank</h1>
  </div>

  <div class="añadir">
    <h3>New Transaction</h3>
    <form action="" method="post">
      <label for="concept">Concept</label><br>
      <input type="text" id="concept" name="concept" required><br><br>

      <label for="amount">Amount</label><br>
      <input type="number" step="0.01" id="amount" name="amount" required><br><br>

      <label for="type">Type</label><br>
      <input type="text" id="type" name="type" placeholder="Expense / Income" required><br><br>

      <input class="boton1" type="submit" value="Add">
    </form>
  </div>

  <div class="moneda">
    <p>Currency:</p>
    <select>
      <option>Euro (€)</option>
      <option>USD ($)</option>
      <option>Pound (£)</option>
      <option>JPY (¥)</option>
    </select>
  </div>

  <div class="tabla">
    <table>
      <tr>
        <th>Concept</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Date</th>
      </tr>
    </table>
  </div>

  <div class="total">
    <h1>Total Blance:</h1>
  </div>
</body>

</html>