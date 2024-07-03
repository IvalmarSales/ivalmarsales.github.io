<?php

require_once 'Controllers/Database.php';
require_once 'Controllers/Database_connect.php';

class Delete
{
    private $pdo;
    private $table;

    public function __construct($pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function deleteRecord($conditions)
    {
        $conditionPart = implode(" AND ", array_map(function ($key) {
            return "$key = :$key";
        }, array_keys($conditions)));

        $sql = "DELETE FROM $this->table WHERE $conditionPart";
        
        $stmt = $this->pdo->prepare($sql);
        foreach ($conditions as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }
        return $stmt->execute();
    }
}
