<?php

include 'config.php';
if (isset($_POST['daftar'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Enkripsi password menggunakan password_hash()
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan email, username, dan hashed password ke database
    $sql = mysqli_query($conn, "INSERT INTO user (email, username, password) VALUES ('$email', '$username', '$hashed_password')");

    if ($sql) {
        echo "Registrasi berhasil!";
        header("Location: index.php");
    } else {
        echo "Registrasi gagal: " . mysqli_error($conn);
    }
}
?>
