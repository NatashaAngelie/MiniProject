<?php
class User {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $email, $password, $role = 'user') {
        // Mengenkripsi password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Query untuk menambahkan pengguna baru ke database
        $query = "INSERT INTO " . $this->table . " (name, email, password, role) 
                  VALUES (:name, :email, :password, :role)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password) {
        // Query untuk mencari pengguna berdasarkan email
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Jika pengguna ditemukan
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Verifikasi password yang dimasukkan dengan yang ada di database
            if(password_verify($password, $row['password'])) {
                // Menyimpan informasi pengguna ke dalam sesi
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_role'] = $row
                ['role'];
                return $row;
            }
        }
        return false;
    }

    public function getAllUsers() {
        // Query untuk mengambil semua data pengguna
        $query = "SELECT id, name, email, role, created_at FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        // Mengembalikan data dalam bentuk array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}