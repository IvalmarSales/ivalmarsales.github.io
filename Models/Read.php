<?php

require_once 'Controllers/Database.php';
require_once 'Controllers/Database_connect.php';

class Read
{
    private $pdo;
    private $table;

    public function __construct($pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function readRecords($conditions = [], $limit = null, $orderBy = null)
    {
        $sql = "SELECT * FROM $this->table";
        $whereConditions = [];

        // Condições para campos específicos
        $simpleConditions = ['id', 'id_category', 'id_author', 'is_highlight', 'is_active'];
        foreach ($simpleConditions as $field) {
            if (isset($conditions[$field])) {
                if (is_array($conditions[$field]) && isset($conditions[$field]['not'])) {
                    $whereConditions[] = "$field != :{$field}_not";
                } else {
                    $whereConditions[] = "$field = :$field";
                }
            }
        }

        // Condições para campos de data
        $dateFields = ['date_created', 'date_modified'];
        foreach ($dateFields as $field) {
            if (isset($conditions[$field])) {
                $dateCondition = $conditions[$field];
                if (is_array($dateCondition)) {
                    if (isset($dateCondition['between'])) {
                        $whereConditions[] = "$field BETWEEN :{$field}_start AND :{$field}_end";
                    } elseif (isset($dateCondition['greater'])) {
                        $whereConditions[] = "$field > :{$field}_greater";
                    } elseif (isset($dateCondition['less'])) {
                        $whereConditions[] = "$field < :{$field}_less";
                    }
                } else {
                    $whereConditions[] = "$field = :$field";
                }
            }
        }

        // Adicionar cláusula WHERE se existirem condições
        if (!empty($whereConditions)) {
            $sql .= " WHERE " . implode(" AND ", $whereConditions);
        }

        // Adicionar ordenação se especificada
        if ($orderBy) {
            $sql .= " ORDER BY $orderBy DESC";
        }

        // Adicionar limite se especificado
        if ($limit) {
            $sql .= " LIMIT :limit";
        }

        $stmt = $this->pdo->prepare($sql);

        // Vincular parâmetros simples
        foreach ($simpleConditions as $field) {
            if (isset($conditions[$field])) {
                if (is_array($conditions[$field]) && isset($conditions[$field]['not'])) {
                    $stmt->bindValue(":{$field}_not", $conditions[$field]['not']);
                } else {
                    $stmt->bindValue(":$field", $conditions[$field]);
                }
            }
        }

        // Vincular parâmetros de data
        foreach ($dateFields as $field) {
            if (isset($conditions[$field])) {
                $dateCondition = $conditions[$field];
                if (is_array($dateCondition)) {
                    if (isset($dateCondition['between'])) {
                        $stmt->bindValue(":{$field}_start", $dateCondition['between'][0]);
                        $stmt->bindValue(":{$field}_end", $dateCondition['between'][1]);
                    } elseif (isset($dateCondition['greater'])) {
                        $stmt->bindValue(":{$field}_greater", $dateCondition['greater']);
                    } elseif (isset($dateCondition['less'])) {
                        $stmt->bindValue(":{$field}_less", $dateCondition['less']);
                    }
                } else {
                    $stmt->bindValue(":$field", $dateCondition);
                }
            }
        }

        // Vincular limite
        if ($limit) {
            $stmt->bindValue(":limit", (int) $limit, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}