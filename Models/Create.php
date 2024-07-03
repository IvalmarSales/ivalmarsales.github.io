<?php

require_once 'Controllers/Database.php';
require_once 'Controllers/Database_connect.php';

class Create
{
    private $pdo;
    private $table;

    public function __construct($pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function createRecord($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
        
        $stmt = $this->pdo->prepare($sql);
        foreach ($data as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }
        return $stmt->execute();
    }
}
