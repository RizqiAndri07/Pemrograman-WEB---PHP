<?php
$products = array(
    array(
        'name' => 'Product 1',
        'price' => 'Rp 5.999.999',
        'image' => 'asset/product1.jpg'
    ),
    array(
        'name' => 'Product 2',
        'price' => 'Rp 6.999.999',
        'image' => 'asset/product2.jpg'
    ),
    // Tambahkan informasi produk lainnya di sini
);

foreach ($products as $product) {
    ?>
    <div class="w-full max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="p-4 rounded-t-lg rounded-md" src="<?php echo $product['image']; ?>" alt="product image" />
        </a>
        <div class="px-3 pb-3">
            <a href="#">
                <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                    <?php echo $product['name']; ?></h5>
            </a>
            <div class="flex items-center mt-1 mb-3">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                    <!-- Rating stars -->
                    <!-- Place your rating stars here -->
                </div>
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-2">5.0</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-small font-bold text-gray-900 dark:text-white"><?php echo $product['price']; ?></span>
                <a href="index.php?target=cart"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    to cart</a>
            </div>
        </div>
    </div>
    <?php
}
?>