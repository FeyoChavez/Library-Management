<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Loan.php';
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Student.php';

class LoanController {
    private $db;
    private $loan;
    private $book;
    private $student;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->loan = new Loan($this->db);
        $this->book = new Book($this->db);
        $this->student = new Student($this->db);
    }

    public function index() {
        $stmt = $this->loan->read();
        $loans = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require __DIR__ . '/../views/loans/index.php';
    }

   /* public function create() {
        if($_POST) {
            $this->loan->student_name = $_POST['student_name'];
            $this->loan->control_number = $_POST['control_number'];
            $this->loan->career = $_POST['career'];
            $this->loan->book_id = $_POST['book_id'];

            if($this->loan->create()) {
                header("Location: index.php?type=loans&action=index");
            }
        }

        $stmt = $this->book->read();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require __DIR__ . '/../views/loans/create.php';
    } */

    public function create() {
        if ($_POST) {
            $control_number = $_POST['control_number'];
    
            // Obtener detalles del alumno
            $stmt = $this->student->getByControlNumber($control_number);
            $student = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($student) {
                $this->loan->student_name = $student['student_name'];
               // $this->loan->student_surname = $student['surname'];
                $this->loan->control_number = $student['control_number'];
                $this->loan->career = $student['career'];
                $this->loan->book_id = $_POST['book_id'];
    
                if($this->loan->create()) {
                    header("Location: index.php?type=loans&action=index");
                }
            } else {
                // Manejar el caso donde no se encuentra el alumno
                echo "Alumno no encontrado.";
            }
        }
    
        $stmt = $this->book->read();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require __DIR__ . '/../views/loans/create.php';
    }
    
    

    /*
    public function edit($id) {
        //$this->loan->id = $id;

        if($_POST) {
            $this->loan->id = $id;
            $this->loan->student_name = $_POST['student_name'];
            $this->loan->control_number = $_POST['control_number'];
            $this->loan->career = $_POST['career'];
            $this->loan->book_id = $_POST['book_id'];

            if($this->loan->update()) {
                header("Location: index.php?type=loans&action=index");
            }
        } else {
            $this->loan->id = $id;
            $stmt = $this->loan->readOne();
            $loan = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = $this->book->read();
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
            require __DIR__ . '/../views/loans/edit.php';
        }
    } */

    public function edit($id) {
        if ($_POST) {
            $this->loan->id = $id;
            $control_number = $_POST['control_number'];
    
            // Obtener detalles del alumno
            $stmt = $this->student->getByControlNumber($control_number);
            $student = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($student) {
                $this->loan->student_name = $student['student_name'];
               // $this->loan->student_surname = $student['surname'];
                $this->loan->control_number = $student['control_number'];
                $this->loan->career = $student['career'];
                $this->loan->book_id = $_POST['book_id'];
    
                if ($this->loan->update()) {
                    header("Location: index.php?type=loans&action=index");
                }
            } else {
                echo "Alumno no encontrado.";
            }
        } else {
            $this->loan->id = $id;
            $stmt = $this->loan->readOne();
            $loan = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $stmt = $this->book->read();
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
            require __DIR__ . '/../views/loans/edit.php';
        }
    }

    public function delete($id) {
        $this->loan->id = $id;
        if($this->loan->delete()) {
            header("Location: index.php?type=loans&action=index");
        }
    }
}
?>
