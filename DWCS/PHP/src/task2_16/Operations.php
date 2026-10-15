<?php
require_once("Student.php");
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
  public function getStudent($id)
  {
    $sqlString = "select id, dni, name, surname, age from student where id = ?;";
    $query = $this->conn->prepare($sqlString);
    $query->execute([$id]);
    $rowStudent = $query->fetch();

    if (!$rowStudent) {
      return null; // O lanzar una excepción
    }

    $obx = new Student();
    $obx->setId($rowStudent["id"]);
    $obx->setDni($rowStudent["dni"]);
    $obx->setName($rowStudent["name"]);
    $obx->setSurname($rowStudent["surname"]);
    $obx->setAge($rowStudent["age"]);
    return $obx;
  }
  public function getAllStudent()
  {
    $sqlString = "select id, dni, name, surname, age from student;";
    $query = $this->conn->prepare($sqlString);
    $query->execute(); // It executes the sql sentence
    $StudentList = array(); //Create an empty list
    while ($rowStudent = $query->fetch()) {
      //Create an object of MyGuest with the contents of the table row
      $obx = new Student();
      $obx->setId($rowStudent["id"]);
      $obx->setDni($rowStudent["dni"]);
      $obx->setName($rowStudent["name"]);
      $obx->setSurname($rowStudent["surname"]);
      $obx->setAge($rowStudent["age"]);
      $StudentList[] = $obx;
    }
    return $StudentList;
  }
  public function addStudent(Student $Student)
  { //It receives an object of the class Student
    try {
      $this->conn->beginTransaction();
      $sqlString = "insert into student(id, dni, name, surname, age) values (?, ?, ?, ?, ?);";
      $query = $this->conn->prepare($sqlString);
      $query->execute([$Student->getId(), $Student->getDni(), $Student->getName(), $Student->getSurname(), $Student->getAge()]); // It executes the sql sentence
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
  function updateStudent($Student)
  {
    try {
      $this->conn->beginTransaction();
      $stmt = $this->conn->prepare("update student set dni=?, name=?, surname=?, age=? where id=?");
      $dni = $Student->getDni();
      $name = $Student->getName();
      $surname = $Student->getSurname();
      $age = $Student->getAge();
      $id = $Student->getId();
      $stmt->execute([$dni, $name, $surname, $age, $id]);
      $numberOfAddedRows = $stmt->rowCount();
      $this->conn->commit();
      return $numberOfAddedRows;
    } catch (PDOException $e) {
      // roll back the transaction if something failed
      $this->conn->rollback();
      throw $e;
    }
  } //update
  function deleteStudent($id)
  {
    try {
      $this->conn->beginTransaction();
      $stmt = $this->conn->prepare("delete from student where id=?");
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
} //class