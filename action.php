<?php
// login.php
session_start();

// Hardcoded username dan password untuk contoh
$username = "admin@gmail.com";
$password = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["username"] == $username && $_POST["password"] == $password) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: index.php"); // redirect ke halaman utama setelah login
        exit();
    } else {
        echo "Username atau Password salah!";
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // logout.php
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php"); // redirect to the main page after logout
    exit();
}
?>

<!-- CRUD -->

<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $id_merk = $_POST['id_merk'];
    $description = $_POST['description'];

    // Direktori untuk menyimpan file yang diunggah
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file adalah gambar sebenarnya atau bukan
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Periksa apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Batasi ukuran file
    if ($_FILES["image"]["size"] > 500000) { // 500KB max
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Batasi format file
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Periksa apakah $uploadOk diatur ke 0 oleh kesalahan
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Jika semuanya baik-baik saja, coba unggah file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

            // Simpan informasi produk ke dalam database
            $sql = "INSERT INTO barang (name, price, id_merk, description, image) VALUES ('$name', '$price', '$id_merk', '$description', '" . basename($_FILES["image"]["name"]) . "')";
            if (mysqli_query($conn, $sql)) {
                echo "New product created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Tutup koneksi
mysqli_close($conn);
?>