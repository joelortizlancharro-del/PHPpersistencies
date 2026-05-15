<?php

class Llibre {
    public $isbn;
    public $title;
    public $author;
    public $price;
    private $pdo;

    public function __construct() {
        require_once './config/pdo_connect.php';
        $this->pdo = $pdo;
    }

    /**
     * Obtenir el llistat de tots els llibres
     */
    public function index() {
        // TODO: Implementar consulta SELECT per obtenir tots els llibres
    }

    /**
     * Obtenir un llibre per ISBN
     */
    public function show($isbn) {
        // TODO: Implementar consulta SELECT WHERE per obtenir un llibre per ISBN
    }

    /**
     * Inserir un llibre a la taula
     */
    public function store() {
        // TODO: Implementar INSERT amb els atributs $this->isbn, $this->title, $this->author, $this->price
    }

    /**
     * Actualitzar un llibre existentç
     */
    public function update() {
        // TODO: Implementar UPDATE per actualitzar title, author, price on isbn = $this->isbn
    }

    /**
     * Eliminar un llibre per ISBN
     */
    public function destroy($isbn) {
        // TODO: Implementar DELETE per eliminar el llibre amb aquest ISBN
    }
}
?>
