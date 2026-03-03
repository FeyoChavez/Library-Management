<?php
session_start();

require_once 'controllers/BookController.php';
require_once 'controllers/LoanController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/DashController.php';
require_once 'controllers/StudentController.php';

$controller = null;
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$type = isset($_GET['type']) ? $_GET['type'] : 'users';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch($type) {
    case 'books':
        $controller = new BookController();
        break;
    case 'loans':
        $controller = new LoanController();
        break;
    case 'users':
        $controller = new UserController();
        break;
    case 'dashboard':
        $controller = new DashController();
        break;
    case 'students':
        $controller = new StudentController();
        break;
}

switch($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'register':
        $controller->register();
        break;
    case 'login':
        $controller->login();
        break;
    case 'logout':
        $controller->logout();
        break;
    case 'updateRole':
        $controller->updateRole();
        break;
    case 'index':
        $controller->index();
        break;
    case 'search':
        $controller->search();
        break;
    case 'buscar':
        $controller->buscar();
        break;
    default:
        $controller->index();
        break;
}
?>
