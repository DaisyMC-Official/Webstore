<?php

class Database_Connection
{
    private $host = "37.1.226.117";
    private $database = "webstore";
    private $username = "webstore_admin";
    private $password = "n&TU7!@A1eh";
    private $connection;

    public function connect()
    {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host}; dbname={$this->database}",
                $this->username,
                $this->password
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
