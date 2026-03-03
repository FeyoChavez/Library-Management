<?php
class Student {
    private $conn;
    private $table_name = "students";

    public $id;
    public $student_name;
    public $control_number;
    public $career;


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
        $query = "INSERT INTO " . $this->table_name . " SET student_name=:student_name, control_number=:control_number, career=:career";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":student_name", $this->student_name);
        $stmt->bindParam(":control_number", $this->control_number);
        $stmt->bindParam(":career", $this->career);

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
        $query = "UPDATE " . $this->table_name . " SET student_name=:student_name, control_number=:control_number, career=:career WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":student_name", $this->student_name);
        $stmt->bindParam(":control_number", $this->control_number);
        $stmt->bindParam(":career", $this->career);
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

    public function getByControlNumber($control_number) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE control_number = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $control_number);
        $stmt->execute();

        return $stmt;
    }

    function search($search) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE student_name LIKE ?";
        $stmt = $this->conn->prepare($query);
        $search = "%$search%";
        $stmt->bindParam(1, $search);
        $stmt->execute();
        return $stmt;
    }

    /*public function buscar($term) {
        $query = "SELECT * FROM students WHERE title LIKE ? LIMIT 10";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["%{$term}%"]);
        return $stmt;
    } */
}

?>
