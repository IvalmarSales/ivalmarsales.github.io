<?php

require_once 'Configuration/config_db.php';

// Conexão com o banco de dados
$db = new Database($host, $dbname, $username, $password);
$pdo = $db->connect();