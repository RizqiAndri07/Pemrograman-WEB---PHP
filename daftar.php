<?php

include 'config.php';
if (isset($_POST['daftar'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql =mysqli_query($conn,"INSERT INTO user (email,username, password) VALUES ('$email','$username', '$password')");
}
?>