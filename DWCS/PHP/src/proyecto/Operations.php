<?php
require_once("Money.php");
class Operations
{
  private $conn;
  public function __construct()
  {
    $this->openConnection();
  }
  public function openConnection()
  {
    // Database configuration (match your docker-compose.yml)
    $host = 'mysql';          // The service name in docker-compose (not 'localhost')
    $db   = 'app';        // Database name
    $user = 'app';        // MySQL username
    $pass = 'app_password';    // MySQL passwordm
    $charset = 'utf8mb4';

    // DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    // PDO options for better error handling and performance
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch results as associative arrays
      PDO::ATTR_EMULATE_PREPARES   => false,                  // Use real prepared statements
    ];

    // Create a PDO instance (connect to the database)
    $this->conn = new PDO($dsn, $user, $pass, $options);
  }
  public function closeConnection()
  {
    $this->conn = null;
  }

  public function getMoney($id)
  {
    $sqlString = "select id, concept, amount, type, date from money where id = ?;";
    $query = $this->conn->prepare($sqlString);
    $query->execute([$id]);
    $rowMoney = $query->fetch();

    if (!$rowMoney) {
      return null;
    }

    $obx = new Money();
    $obx->setId($rowMoney["id"]);
    $obx->setConcept($rowMoney["concept"]);
    $obx->setAmount($rowMoney["amount"]);
    $obx->setType($rowMoney["type"]);
    $obx->setDate($rowMoney["date"]);
    return $obx;
  }

  public function getAllMoney()
  {
    $sqlString = "select id, concept, amount, type, date from money;";
    $query = $this->conn->prepare($sqlString);
    $query->execute();
    $MoneyList = array();
    while ($rowMoney = $query->fetch()) {

      $obx = new Money();
      $obx->setId($rowMoney["id"]);
      $obx->setConcept($rowMoney["concept"]);
      $obx->setAmount($rowMoney["amount"]);
      $obx->settype($rowMoney["type"]);
      $obx->setDate($rowMoney["date"]);
      $MoneyList[] = $obx;
    }
    return $MoneyList;
  }

  public function addMoney(Money $Money)
  {
    try {
      $this->conn->beginTransaction();

      $sqlString = "INSERT INTO money(concept, amount, type, date) VALUES (?, ?, ?, ?);";
      $query = $this->conn->prepare($sqlString);

      $query->execute([
        $Money->getConcept(),
        $Money->getAmount(),
        $Money->getType(),
        $Money->getDate()
      ]);

      $numberOfAddedRows = $query->rowCount();
      $this->conn->commit();

      return $numberOfAddedRows > 0;
    } catch (PDOException $erro) {

      $this->conn->rollback();
      throw $erro;
    }
  }
  function deleteMoney($id)
  {
    try {
      $this->conn->beginTransaction();
      $stmt = $this->conn->prepare("delete from money where id=?");
      $stmt->execute([$id]);
      $numberOfAddedRows = $stmt->rowCount();
      $this->conn->commit();
      return $numberOfAddedRows;
    } catch (PDOException $e) {
      // roll back the transaction if something failed
      $this->conn->rollback();
      throw $e;
    }
  } //delete
}
