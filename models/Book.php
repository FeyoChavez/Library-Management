<?php
class Book {
    private $conn;
    private $table_name = "books";

    public $id;
    public $title;
    public $author;
    public $edition;
    public $isbn;
    public $area;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    function create() { 
        $query = "INSERT INTO " . $this->table_name . " SET title=:title, author=:author, edition=:edition, isbn=:isbn, area=:area";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":edition", $this->edition);
        $stmt->bindParam(":isbn", $this->isbn);
        $stmt->bindParam(":area", $this->area);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    function readOne() {
        $query = "SELECT * FROM ". $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET title=:title, author=:author, edition=:edition, isbn=:isbn, area=:area WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":edition", $this->edition);
        $stmt->bindParam(":isbn", $this->isbn);
        $stmt->bindParam(":area", $this->area);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // funcion que permite buscar a los alumnos por su nombre
    function search($search) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE title LIKE ?";
        $stmt = $this->conn->prepare($query);
        $search = "%$search%";
        $stmt->bindParam(1, $search);
        $stmt->execute();
        return $stmt;
    }

    public function buscar($term) {
        $query = "SELECT * FROM books WHERE title LIKE ? LIMIT 10";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["%{$term}%"]);
        return $stmt;
    }
}
?>
