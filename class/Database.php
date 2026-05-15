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
        // TODO: Implementar CREATE DATABASE IF NOT EXISTS dam_llibres
    }

    /**
     * Crear la taula llibres amb els camps: isbn, author, title, price
     */
    public function createDatatable() {
        // TODO: Implementar CREATE TABLE IF NOT EXISTS llibres amb estructura adient
    }

    /**
     * Omplir la taula amb dades inicials
     */
    public function populateDatatable() {
        // TODO: Implementar INSERT de dades de mostra
    }

    /**
     * Verificar si la base de dades existeix
     */
    public function existDatabase() {
        // TODO: Verificar si dam_llibres existeix
    }

    /**
     * Verificar si la taula llibres existeix
     */
    public function existDatatable() {
        // TODO: Verificar si existeix la taula llibres
    }

    /**
     * Verificar si hi ha dades a la taula
     */
    public function existData() {
        // TODO: Verificar si hi ha algun registre a la taula llibres
    }
}

?>
