<?php

/**
 * Dit is de database class om te kunnen praten met de database. We gebruiken PDO
 */
namespace OOP\classes;
use \PDO, \PDOException;

require '../config/config.php';

class Database {

    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $dbHandler;
    private $statement;

    public function __construct() {
        $conn = "mysql:host=$this->dbHost;dbname=$this->dbName;chartset=UTF-8";

        try{
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass);
            $this->dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($sql) {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    public function bind($parameter, $value, $type) {
        $this->statement->bindValue($parameter, $value, $type);
    }

    public function execute() {
        return $this->statement->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }
}