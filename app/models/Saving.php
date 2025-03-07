<?php
class Saving {
    private $conn;
    private $table = 'savings';

    public function __construct($db) {
        // Menyimpan koneksi database
        $this->conn = $db;
    }

    public function create($user_id, $amount, $message) {
        // Query untuk menambahkan data tabungan ke dalam database
        $query = "INSERT INTO " . $this->table . " (user_id, amount, message) VALUES (:user_id, :amount, :message)";
        $stmt = $this->conn->prepare($query);
        
        // Bind parameter untuk mencegah SQL injection
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':message', $message);
        
        // Menjalankan query dan mengembalikan hasilnya
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Mendapatkan ID pengguna dari sesi
    public function getAll() {
        $userId = $_SESSION['user_id'];
        $isAdmin = $_SESSION['user_role'] === 'admin';

        if ($isAdmin) {
        $query = "SELECT d.*, u.name FROM " . $this->table . " d
                  JOIN users u ON d.user_id = u.id
                  ORDER BY d.created_at ASC";
        $stmt = $this->conn->prepare($query);
        }

        else {
            $query = "SELECT d.*, u.name FROM " . $this->table . " d
                      JOIN users u ON d.user_id = u.id
                      WHERE d.user_id = :user_id
                      ORDER BY d.created_at ASC";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        $userId = $_SESSION['user_id'];

        //Admin dan user hanya bisa melihat setoran mereka sendiri
        $query = "SELECT d.*, u.name FROM " . $this->table . " d
                  JOIN users u ON d.user_id = u.id
                  WHERE d.user_id = :user_id
                  ORDER BY d.created_at ASC";
        
        $stmt = $this->conn->prepare($query); // Ubah dari $this->db ke $this->conn
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUserId($userId) {
        $query = "SELECT d.*, u.name FROM " . $this->table . " d
                  JOIN users u ON d.user_id = u.id
                  WHERE d.user_id = :user_id
                  ORDER BY d.created_at ASC";
        $stmt = $this->conn->prepare($query); // Ubah dari $this->db ke $this->conn
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}