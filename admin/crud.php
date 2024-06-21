<?php
include '../config.php'; // Mengimpor konfigurasi database


if (isset($_POST["add"])) {
    $id_merk = $_POST['id_merk'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $id = $_POST["id"];
    // Mengambil nama file gambar dan menentukan path target
    $image = $_FILES['image']['name'];
    // Mengambil data dari form
    $target = "../uploads/" . basename($image);

    // Query untuk menambahkan data ke dalam tabel barang
    $add = mysqli_query($conn, "INSERT INTO barang (id_merk, name, image, description, price) VALUES ('$id_merk', '$name', '$image', '$description', '$price')");

    // Memindahkan file yang diunggah ke direktori target
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "The file " . htmlspecialchars($image) . " has been uploaded and the data has been added to the database.";
        header('Location: index.php?target=product');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
if (isset($_POST["edit"])) {
    $id = $_POST['id']; // Mendapatkan id dari input hidden
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $id_merk = $_POST['id_merk'];
    $image = $_FILES['image']['name'];

    if (isset($_POST["edit"])) {
        // Upload file jika ada gambar baru
        if (!empty($image)) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $sql = "UPDATE barang SET name='$name', price='$price', id_merk='$id_merk', description='$description', image='$image' WHERE id = $id";
        } else {
            // Update data tanpa mengubah gambar
            $sql = "UPDATE barang SET name='$name', price='$price', id_merk='$id_merk', description='$description' WHERE id = $id";
        }

        // Lakukan eksekusi query sesuai dengan kebutuhan
        // Misalnya, $connect adalah koneksi ke database
        $update = mysqli_query($conn, $sql);

        if ($update) {
            echo "<script>alert('Berhasil update data.');
              document.location= 'index.php?target=product'</script>";
        } else {
            echo "<script>alert('Gagal update data.');
              document.location= 'index.php?target=product'</script>";
        }
    }

}
if (isset($_POST['delete'])) {
    $hapus = mysqli_query($conn, "DELETE FROM barang WHERE id = '$_POST[id]'");
    if ($hapus) {
        echo " <script>
        
                alert('berhasil Delete data')
                document.location= 'index.php?target=product'
        
        </script> ";

    } else {
        echo "<script>
            alert('Gagal Delete data')
                document.location= 'index.php?target=product'
        </script>";
    }
}
?>