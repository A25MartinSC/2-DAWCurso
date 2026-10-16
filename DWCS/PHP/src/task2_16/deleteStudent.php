<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Delete</title>
  <style>
    * {
      font-family: 'Trebuchet MS', Arial, sans-serif;
      box-sizing: border-box;
    }

    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 100px;
      background-color: #d1e6f7;
    }

    .botones {
      padding: 70px;
      background-color: #ffffff;
      border-radius: 10px;
    }

    .boton1 {
      font-weight: bold;
      margin-top: 15px;
      background-color: #f12525;
      color: black;
      padding: 15px 80px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .boton2 {
      font-weight: bold;
      margin-top: 15px;
      background-color: #82d8e7;
      color: black;
      padding: 15px 80px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="botones">
    <h1>Are you sure you want to delete this student?</h1>

    <button class="boton1">Yes,delete</button>

    <a href="index.php">
      <button class="boton2">Cancel</button>
    </a>

  </div>
</body>

</html>