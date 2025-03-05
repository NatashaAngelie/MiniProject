<?php
class HomeController {
    private $db;
    private $savingModel;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Saving.php';
        require_once 'app/models/User.php'; // Tambahkan ini
        $this->savingModel = new Saving($this->db);
        $this->userModel = new User($this->db); // Inisialisasi User model
    }

    public function index() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAuthenticated();
        
        $userId = AuthMiddleware::getUserId();
        $isAdmin = $_SESSION['user_role'] === 'admin';
        $saving = $this->savingModel->getByUserId($userId); // Admin & user hanya lihat setorannya sendiri
        require_once 'app/views/home.php';
    }

    public function admin() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin();
        
        $users = $this->userModel->getAllUsers(); // Ambil semua user dari database
        $saving = $this->savingModel->getAll();
        require_once 'app/views/admin.php';
    }
}