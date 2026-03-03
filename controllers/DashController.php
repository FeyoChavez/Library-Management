<?php
require_once __DIR__ . '/../config/database.php';

class DashController {

    private $inicio;

    public function index() {
        require __DIR__ . '/../views/dashboard/index.php';
    }
}

?>
