<?php
class HomeController {
    private $db;
    private $savingModel;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Saving.php';
        require_once 'app/models/User.php'; 
        $this->savingModel = new Saving($this->db); // Inisialisasi Saving model
        $this->userModel = new User($this->db); // Inisialisasi User model
    }

    public function index() {
        // Memastikan pengguna sudah login sebelum mengakses halaman
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAuthenticated();
        
        // Mendapatkan ID pengguna yang sedang login
        $userId = AuthMiddleware::getUserId();
        // Mengecek apakah pengguna adalah admin
        $isAdmin = $_SESSION['user_role'] === 'admin';
        // Mengambil data tabungan berdasarkan ID pengguna
        $saving = $this->savingModel->getByUserId($userId); // Admin & user hanya lihat setorannya sendiri
        require_once 'app/views/home.php';
    }

    public function admin() {
        // Memastikan hanya admin yang bisa mengakses halaman admin
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin();
        
        $users = $this->userModel->getAllUsers(); // Ambil semua user dari database
        $saving = $this->savingModel->getAll(); // Mengambil semua data tabungan dari database
        require_once 'app/views/admin.php';
    }
}