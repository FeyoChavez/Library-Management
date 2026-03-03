<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Book.php';

class BookController {
    private $db;
    private $book;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->book = new Book($this->db);
    }

    public function index() {
        $stmt = $this->book->read();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require __DIR__ . '/../views/books/index.php';
    }

    public function create() {
        if($_POST) {
            $this->book->title = $_POST['title'];
            $this->book->author = $_POST['author'];
            $this->book->edition = $_POST['edition'];
            $this->book->isbn = $_POST['isbn'];
            $this->book->area = $_POST['area'];

            if($this->book->create()) {
                header("Location: index.php?type=books&action=index");
            }
        }
        require __DIR__ . '/../views/books/create.php';
    }

    public function edit($id) {
       // $this->book->id = $id;

        if($_POST) {
            $this->book->id = $id;
            $this->book->title = $_POST['title'];
            $this->book->author = $_POST['author'];
            $this->book->edition = $_POST['edition'];
            $this->book->isbn = $_POST['isbn'];
            $this->book->area = $_POST['area'];

            if($this->book->update()) {
                header("Location: index.php?type=books&action=index");
            }
        } else {
            $this->book->id = $id;
            $stmt = $this->book->readOne();
            $book = $stmt->fetch(PDO::FETCH_ASSOC);
            require __DIR__ . '/../views/books/edit.php';
        }
    }

    public function delete($id) {
        $this->book->id = $id;
        if($this->book->delete()) {
            header("Location: index.php?type=books&action=index");
        }
    }

    public function search() {
        if ($_POST) {
            $search = $_POST['search'];
            $stmt = $this->book->search($search);
            $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
            require __DIR__ . '/../views/books/index.php'; 
            
        } else {
            $this->index();
           
        }
    }

    public function buscar() {
        if (isset($_GET['term'])) {
            $term = $_GET['term'];
            $stmt = $this->book->search($term);
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($books);
        }
    }
    
}
?>
