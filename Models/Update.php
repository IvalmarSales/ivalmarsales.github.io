<?php

require_once 'Controllers/Database.php';
require_once 'Controllers/Database_connect.php';

class Update
{
    private $pdo;
    private $table;

    public function __construct($pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function updateRecord($data, $conditions)
    {
        $setPart = implode(", ", array_map(function ($key) {
            return "$key = :$key";
        }, array_keys($data)));

        $conditionPart = implode(" AND ", array_map(function ($key) {
            return "$key = :condition_$key";
        }, array_keys($conditions)));

        $sql = "UPDATE $this->table SET $setPart WHERE $conditionPart";
        
        $stmt = $this->pdo->prepare($sql);

        // Bind data values
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        // Bind condition values
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":condition_$key", $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        return $stmt->execute();
    }
}