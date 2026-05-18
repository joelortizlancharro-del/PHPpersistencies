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
        $stmt = $this->pdo->prepare("SELECT * FROM llibres ORDER BY nom") 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtenir un llibre per ISBN
     */
    public function show($isbn) {
        // TODO: Implementar consulta SELECT WHERE per obtenir un llibre per ISBN
        $stmt = $this->pdo->prepare("SELECT * FROM llibres WHERE isbn = ?");
        $stmt->execute([$isbn]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Inserir un llibre a la taula
     */
    public function store() {
        // TODO: Implementar INSERT amb els atributs $this->isbn, $this->title, $this->author, $this->price
        $stmt = $this->pdo->prepare(
            "INSERT INTO llibres (isbn, author, title, price) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$this->isbn, $this->author, $this->title, $this->price]);
    }

    /**
     * Actualitzar un llibre existentç
     */
    public function update() {
        // TODO: Implementar UPDATE per actualitzar title, author, price on isbn = $this->isbn
        $stmt = $this->pdo->prepare(
            "UPDATE llibres SET  title=? ,author= ?, price=?
            where isbn=?");
            return $stmt->execute([ $this->title, $this->author, $this->price, $this->isbn]);
    }
    

    /**
     * Eliminar un llibre per ISBN
     */
    public function destroy($isbn) {
        // TODO: Implementar DELETE per eliminar el llibre amb aquest ISBN
        $stmt = $this->pdo->prepare("DELETE FROM llibres WHERE isbn = ?");
        $stmt->execute([$isbn]);

        return $stmt->rowCount();
    }
}
?>
