<div class="container p-4 grid grid-cols-4 gap-3">
    <?php
    include ('config.php'); //memanggil file koneksi
    $sql = mysqli_query($conn, "SELECT * FROM barang INNER JOIN merk ON barang.id_merk=merk.id_merk;");
    //script untuk menampilkan data barang
    
    //melakukan perulangan
    while ($datas = mysqli_fetch_array($sql)):
        ?>

        <div
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg hover:shadow hover:scale-y-105 transition duration-0 hover:duration-300 ease-in-out">
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
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Rp
                        <?= number_format($datas['price'], 0, ',', '.') ?></span>
                    <button href="index.php?target=cart"
                        class="text-white border-2 rounded-full bg-black hover:bg-white hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-white dark:focus:ring-blue-800 transition hover:duration-300 ease-in-out ">Buy</button>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>