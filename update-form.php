<?php
include 'config.php';

$id = $_GET['id'];
if (!isset($id) || empty($id)) {
    die('Invalid product ID');
}

$sql = "SELECT barang.*, merk.merk FROM barang JOIN merk ON barang.id_merk=merk.id_merk WHERE barang.id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Product not found.");
}

$conn->close();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $id_merk = $_POST["id_merk"];
    $description = $_POST["description"];
    $image = $_FILES["image"]["name"];

    // Upload file jika ada gambar baru
    if ($image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Update data dengan gambar baru
        $sql = "UPDATE barang SET name='$name', price='$price', id_merk='$id_merk', description='$description', image='$image' WHERE id='$id'";
    } else {
        // Update data tanpa mengubah gambar
        $sql = "UPDATE barang SET name='$name', price='$price', id_merk='$id_merk', description='$description' WHERE id='$id'";
    }
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='index.php?target=product';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<body>
    <div class="container mx-auto px-4 py-8">
        <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="id_merk"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Merk</label>
                <select name="id_merk" id="id_merk"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <?php
                    include 'config.php';
                    $sql = "SELECT * FROM merk";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $selected = ($product['id_merk'] == $row['id_merk']) ? 'selected' : '';
                            echo "<option value='" . $row['id_merk'] . "' $selected>" . $row['merk'] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
                <input type="file" id="image" name="image"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                <?php if (!empty($product['image'])) { ?>
                    <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>" class="mt-2 w-32 h-32 object-cover">
                <?php } ?>
            </div>
            <div>
                <input type="submit" value="Update Produk"
                    class="mt-1 block w-full bg-blue-500 text-white rounded-md shadow-sm p-2 cursor-pointer hover:bg-blue-600">
            </div>
        </form>
    </div>
</body>