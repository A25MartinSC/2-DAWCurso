<?php
require_once("MyGuests.php");
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
    $pass = 'app_password';    // MySQL password
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
  public function getMyGuest($id)
  {
    $sqlString = "select id, firstname, lastname, email, reg_date from myguests where id = ?;";
    $query = $this->conn->prepare($sqlString);
    $query->execute([$id]); // It executes the sql sentence
    $rowMyGuest = $query->fetch(); // It accesses the first row of data
    //Create an object of MyGuest with the contents of the table row
    $obx = new MyGuests();
    $obx->setId($rowMyGuest["id"]);
    $obx->setFirstname($rowMyGuest["firstname"]);
    $obx->setLastname($rowMyGuest["lastname"]);
    $obx->setEmail($rowMyGuest["email"]);
    $obx->setReg_date($rowMyGuest["reg_date"]);
    return $obx;
  }
  public function getAllMyGuest()
  {
    $sqlString = "select id, firstname, lastname, email, reg_date from myguests;";
    $query = $this->conn->prepare($sqlString);
    $query->execute(); // It executes the sql sentence
    $myGuestList = array(); //Create an empty list
    while ($rowMyGuest = $query->fetch()) {
      //Create an object of MyGuest with the contents of the table row
      $obx = new MyGuests();
      $obx->setId($rowMyGuest["id"]);
      $obx->setFirstname($rowMyGuest["firstname"]);
      $obx->setLastname($rowMyGuest["lastname"]);
      $obx->setEmail($rowMyGuest["email"]);
      $obx->setReg_date($rowMyGuest["reg_date"]);
      $myGuestList[] = $obx;
    }
    return $myGuestList;
  }
  public function addMyGuests(MyGuests $myGuests)
  { //It receives an object of the class MyGuests
    try {
      $this->conn->beginTransaction();
      $sqlString = "insert into myguests(firstname, lastname, email, reg_date) values (?, ?, ?, ?);";
      $query = $this->conn->prepare($sqlString);
      $query->execute([$myGuests->getFirstname(), $myGuests->getLastname(), $myGuests->getEmail(), $myGuests->getReg_date()]); // It executes the sql sentence
      $numberOfAddedRows = $query->rowCount();
      $this->conn->commit();

      if ($query->rowCount() > 0) {
        //Commit the transaction if everything went well
        return true;
      } else return false;
    } catch (PDOException $erro) {
      // Roll back the transaction if somthing failed
      $this->conn->rollback();
      throw $erro;
    }
  }
  public function updateMyGuests(MyGuests $myGuests)
  {
    $sqlString = "update MyGuests set firstname=?, lastname=?, email=?, reg_date=? where id=?";
  }
  public function deleteMyGuests($id) {}
} //class