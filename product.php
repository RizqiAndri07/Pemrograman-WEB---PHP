<div class="container flex p-4 gap-3">
    <?php
    include ('config.php'); //memanggil file koneksi
    $sql = mysqli_query($conn, "SELECT * FROM barang INNER JOIN merk ON barang.id_merk=merk.id_merk;") or die(mysqli_error($conn));
    //script untuk menampilkan data barang
    
    //melakukan perulangan
    while ($datas = mysqli_fetch_array($sql)):
        ?>

        <div
            class="w-full max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="p-8 rounded-t-lg" src="uploads/<?= $datas['image'] ?>" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $datas['name'] ?>
                    </h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                    <h6 class="text-gray"><?= $datas['merk'] ?></h6>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xl font-bold text-gray-900 dark:text-white">Rp
                        <?= number_format($datas['price'], 0, ',', '.') ?></span>
                    <a href="index.php?target=cart"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                        to cart</a>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>