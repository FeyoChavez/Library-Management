<?php
class Loan {
    private $conn;
    private $table_name = "loans";

    public $id;
    public $student_name;
    public $control_number;
    public $career;
    public $book_id;
    public $student_surname;
 
    public function __construct($db) {
        $this->conn = $db;
    }

    /*function create() {
        $query = "INSERT INTO " . $this->table_name . " SET student_name=:student_name, control_number=:control_number, career=:career, book_id=:book_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":student_name", $this->student_name);
        $stmt->bindParam(":control_number", $this->control_number);
        $stmt->bindParam(":career", $this->career);
        $stmt->bindParam(":book_id", $this->book_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    } */

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET student_name = :student_name, control_number = :control_number, career = :career, book_id = :book_id";

        $stmt = $this->conn->prepare($query);

        // limpiar datos
        $this->student_name = htmlspecialchars(strip_tags($this->student_name));
        $this->student_surname = htmlspecialchars(strip_tags($this->student_surname));
        $this->control_number = htmlspecialchars(strip_tags($this->control_number));
        $this->career = htmlspecialchars(strip_tags($this->career));
        $this->book_id = htmlspecialchars(strip_tags($this->book_id));

        // bind values
        $stmt->bindParam(":student_name", $this->student_name);
        //$stmt->bindParam(":student_surname", $this->student_surname);
        $stmt->bindParam(":control_number", $this->control_number);
        $stmt->bindParam(":career", $this->career);
        $stmt->bindParam(":book_id", $this->book_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function read() {
        $query = "SELECT loans.*, books.title as book_title FROM " . $this->table_name . " INNER JOIN books ON loans.book_id = books.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function readOne() {
        $query = "SELECT * FROM ". $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }
/*
    function update() {
        $query = "UPDATE " . $this->table_name . " SET student_name = :student_name, control_number = :control_number, career = :career, book_id = :book_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":student_name", $this->student_name);
        $stmt->bindParam(":control_number", $this->control_number);
        $stmt->bindParam(":career", $this->career);
        $stmt->bindParam(":book_id", $this->book_id);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    } */

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET student_name = :student_name, control_number = :control_number, career = :career, book_id = :book_id
                  WHERE id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        // limpiar datos
        $this->student_name = htmlspecialchars(strip_tags($this->student_name));
       // $this->student_surname = htmlspecialchars(strip_tags($this->student_surname));
        $this->control_number = htmlspecialchars(strip_tags($this->control_number));
        $this->career = htmlspecialchars(strip_tags($this->career));
        $this->book_id = htmlspecialchars(strip_tags($this->book_id));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        // bind values
        $stmt->bindParam(":student_name", $this->student_name);
       // $stmt->bindParam(":student_surname", $this->student_surname);
        $stmt->bindParam(":control_number", $this->control_number);
        $stmt->bindParam(":career", $this->career);
        $stmt->bindParam(":book_id", $this->book_id);
        $stmt->bindParam(":id", $this->id);
    
        if ($stmt->execute()) {
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
}
?>
