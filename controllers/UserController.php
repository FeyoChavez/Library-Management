<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register() {
        if($_POST) {
            $this->user->username = $_POST['username'];
            $this->user->password = $_POST['password'];
            $this->user->role = 'user';
            $this->user->names = $_POST['names'];
            $this->user->last_name = $_POST['last_name'];
            $this->user->control = $_POST['control'];

            if($this->user->create()) {
               // header("Location: ./index.php?type=users&action=login");
               $mensaje = "Usuario creado exitosamente";
            }
        }
        require __DIR__ . '/../views/users/register.php';
    }

    public function login() {
        if($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->user->checkCredentials($username, $password);

            if($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if($user['role'] == 'admin') {
                    //session_start();
                    header("Location: ./index.php?type=dashboard&action=index");
                } else {
                    header("Location: ./index.php?type=dashboard&action=index");
                    //$autenticacion = "Se cuenta aun no está autorizada";
                }
            } else {
                $error = "Usuario o contraseña incorrectos.";
            }
        }
        require __DIR__ . '/../views/users/login.php';
    }

    public function logout() {
        //session_start();
        //session_unset();
        session_destroy();
        header("Location: ./index.php?type=users&action=login");
    }

    public function index() {
        $stmt = $this->user->read();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require __DIR__ . '/../views/users/index.php';
    }

    public function updateRole() {
        if($_POST) {
            $this->user->id = $_POST['id'];
            $this->user->role = $_POST['role'];

            if($this->user->updateRole()) {
                header("Location: index.php?type=users&action=index");
            }
        }
    }

    public function delete($id) {
        $this->user->id = $id;
        if($this->user->delete()) {
            header("Location: index.php?type=users&action=index");
        }
    }


}

?>

