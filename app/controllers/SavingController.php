<?php
class SavingController {
    private $db;
    private $savingModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Saving.php';
        $this->savingModel = new Saving($this->db);
    }

    public function index(){
        require_once 'app/helpers/AuthMiddleware.php';
        $userId = AuthMiddleware::getuserId();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];
            $message = $_POST['message'];    

        // Menyimpan data tabungan ke database
        if ($this->savingModel->create($userId, $amount, $message)) { 
            header('Location: home');
            exit();
            }
        }
        
        require_once 'app/views/save.php';
    }
}
