<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';

class StudentController {
    private $db;
    private $student;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->student = new Student($this->db);
    }

    public function index() {
        $stmt = $this->student->read();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require __DIR__ . '/../views/students/index.php';

    }

    public function create() {
        if($_POST) {
            $this->student->student_name = $_POST['student_name'];
            $this->student->control_number = $_POST['control_number'];
            $this->student->career = $_POST['career'];

            if($this->student->create()) {
                header("Location: index.php?type=students&action=index");
            }
        }
        require __DIR__ . '/../views/students/create.php';
    }

    public function edit($id) {
       // $this->book->id = $id;

        if($_POST) {
            $this->student->id = $id;
            $this->student->student_name = $_POST['student_name'];
            $this->student->control_number = $_POST['control_number'];
            $this->student->career = $_POST['career'];

            if($this->student->update()) {
                header("Location: index.php?type=students&action=index");
            }
        } else {
            $this->student->id = $id;
            $stmt = $this->student->readOne();
            $student = $stmt->fetch(PDO::FETCH_ASSOC);
            require __DIR__ . '/../views/students/edit.php';
        }
    }

    public function delete($id) {
        $this->student->id = $id;
        if($this->student->delete()) {
            header("Location: index.php?type=students&action=index");
        }
    }

    public function search() {
        if ($_POST) {
            $search = $_POST['search'];
            $stmt = $this->student->search($search);
            $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
            require __DIR__ . '/../views/students/index.php'; 
            
        } else {
            $this->index();
           
        }
    }

    /*
    public function buscar() {
        if (isset($_GET['term'])) {
            $term = $_GET['term'];
            $stmt = $this->student->search($term);
            $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($students);
        }
    } */
    
}
?>
