<?php

class Database {

    const HOST = 'localhost';

    const NAME = 'permissions';

    const USER = 'root';

    const PASS = '';

    private $table;

    private $connection;

    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }

}