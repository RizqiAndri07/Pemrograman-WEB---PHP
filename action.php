<?php
// login.php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil informasi pengguna dari database berdasarkan username
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Verifikasi password dengan hash yang tersimpan di database
        if (password_verify($password, $user['password'])) {
            $_SESSION["admin_logged_in"] = true;
            $_SESSION["username"] = $user['username'];
            header("Location: index.php"); // Redirect ke halaman utama setelah login
            exit();
        } else {
            echo "Username atau Password salah!";
        }
    } else {
        echo "Username atau Password salah!";
    }
}
?>