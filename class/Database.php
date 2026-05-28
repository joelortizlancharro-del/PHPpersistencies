<?php

class Database {

    private static $pdo;

    public function __construct() {
        require_once './config/pdo_connect.php';
        self::$pdo = $pdo;
    }

    private static function getConnection() {
        if (!self::$pdo) {
            require_once './config/pdo_connect.php';
            self::$pdo = $pdo;
        }
        return self::$pdo;
    }

    /**
     * Crear la base de dades dam_llibres
     */
    public function createDatabase() {
        try{
            $pdo = self::getConnection();
            $sql = "CREATE DATABASE IF NOT EXISTS 
            `dam_llibres` default character set utf8 collate utf8_general_ci";
            $pdo->exec($sql);
            return true;
        } catch (PDOException $e){
            return false;
        }
    }

    /**
     * Crear la taula llibres amb els camps: isbn, author, title, price
     */
    public function createDatatable() {
        try {
            $pdo = self::getConnection();
            $pdo->exec("USE dam_llibres");
            
            $sql = "CREATE TABLE IF NOT EXISTS llibres (
                isbn VARCHAR(20) PRIMARY KEY,
                author VARCHAR(100) NOT NULL,
                title VARCHAR(150) NOT NULL,
                price DECIMAL(10, 2) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
            
            $pdo->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

/**
     * Omplir la taula amb dades inicials
     */
    public function populateDatatable() {
        try {
            $pdo = self::getConnection();
            $pdo->exec("USE dam_llibres");
            
            // Usamos INSERT IGNORE para no duplicar datos si se ejecuta más de una vez
            $sql = "INSERT IGNORE INTO llibres (isbn, author, title, price) VALUES 
                ('1112', 'Gambardella, Matthew', 'XML Developer''s Guide', 44.95),
                ('1113', 'Ralls, Kim', 'Midnight Rain', 5.95),
                ('1114', 'Corets, Eva', 'Maeve Ascendant', 5.95),
                ('1115', 'Corets, Eva', 'Oberon''s Legacy', 5.95),
                ('1116', 'Corets, Eva', 'The Sundered Grail', 5.95),
                ('1117', 'Randall, Cynthia', 'Lover Birds', 4.95),
                ('1118', 'Thurman, Paula', 'Splish Splash', 4.95),
                ('1119', 'Knorr, Stefan', 'Creepy Crawlies', 4.95),
                ('1120', 'Kress, Peter', 'Paradox Lost', 6.95),
                ('1121', 'O''Brien, Tim', 'Microsoft .NET: The Programming Bible', 36.95),
                ('1122', 'O''Brien, Tim', 'MSXML3: A Comprehensive Guide', 36.95),
                ('1123', 'Galos, Mike', 'Visual Studio 7: A Comprehensive Guide', 49.95)";
            
            $pdo->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Verificar si la base de dades existeix
     */
    public function existDatabase() {
        try {
            $pdo = self::getConnection();
            // Consultamos el Information Schema que es el estándar en MySQL/MariaDB
            $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'dam_llibres'");
            return (bool) $stmt->fetchColumn();
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Verificar si la taula llibres existeix
     */
    public function existDatatable() {
        try {
            $pdo = self::getConnection();
            $stmt = $pdo->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'dam_llibres' AND TABLE_NAME = 'llibres'");
            return (bool) $stmt->fetchColumn();
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Verificar si hi ha dades a la taula
     */
    public function existData() {
        try {
            $pdo = self::getConnection();
            $pdo->exec("USE dam_llibres");
            
            $stmt = $pdo->query("SELECT COUNT(*) FROM llibres");
            $count = $stmt->fetchColumn();
            
            return $count > 0;
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>