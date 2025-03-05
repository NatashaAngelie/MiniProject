<?php
class AuthMiddleware {
    // Mengecek apakah pengguna sudah login
    public static function isAuthenticated() {
        if (!isset($_SESSION['user_id'])) {
            // Jika belum login, arahkan ke halaman login
            header('Location: login');
            exit();
        }
    }

    // Mengecek apakah pengguna adalah admin
    public static function isAdmin() {
        // Pastikan pengguna sudah login terlebih dahulu
        self::isAuthenticated();
        // Jika peran pengguna bukan admin, arahkan ke halaman home
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: home');
            exit();
        }
    }

    // Mengecek apakah pengguna adalah tamu (belum login)
    public static function isGuest() {
        if (isset($_SESSION['user_id'])) {
            header('Location: home');
            exit();
        }
    }

    // Mengambil ID pengguna yang sedang login
    public static function getuserId(){
        self::isAuthenticated();
        return $_SESSION['user_id'];
    }
}
