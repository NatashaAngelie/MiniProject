<?php
class Database {
    private $host = 'localhost'; // Host database (server tempat database berjalan)
    private $db_name = 'tabungann_db'; // Nama database yang digunakan
    private $username = 'root'; // Username untuk koneksi ke database
    private $password = ''; // Password untuk koneksi ke database (kosong untuk default XAMPP/MAMP)
    private $conn; // Properti untuk menyimpan koneksi database

    public function connect() {
        try {
            // Membuat koneksi ke database menggunakan PDO(PHP Data Objects), yang dimana merupakan sebuah ekstensi dalam PHP yang digunakan untuk berinteraksi dengan database.
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            // Mengatur mode error agar menampilkan exception jika terjadi kesalahan
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;// Mengembalikan objek koneksi jika berhasil
        } catch(PDOException $e) {
            // Menampilkan pesan error jika koneksi gagal
            echo "Connection Error: " . $e->getMessage();
            return null; // Mengembalikan null jika terjadi kesalahan
        }
    }
}