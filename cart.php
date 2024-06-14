<form class="max-w-sm mx-auto m-3" method="post" action="index.php?target=checkout">
    <div class="mb-5">
        <label for="hargabarang" class="block mb-2 text-sm font-medium text-gray-900">Harga Barang (Rp)</label>
        <input type="number" name="hargabarang" id="hargabarang"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            placeholder="Rp 000.000.000" required />
    </div>
    <div class="mb-5">
        <label for="uangmuka" class="block mb-2 text-sm font-medium text-gray-900">Uang Muka (%)</label>
        <input type="number" id="uangmuka" name="uangmuka"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            placeholder="Min 30% " required />
    </div>
    <div class="mb-5">
        <label for="tenor" class="block mb-2 text-sm font-medium text-gray-900">Jangka Waktu(Tahun)</label>
        <input type="number" id="tenor" name="tenor"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-300 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
            placeholder="Min 1 Tahun" required />
    </div>
    <div class="mb-5">
        <label for="margin" class="block mb-2 text-sm font-medium text-gray-900">Margin Bank</label>
        <input type="text" id="margin" aria-label="disabled input 2" name="margin"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="8 %" disabled readonly>

    </div>
    <div class="mb-5">
        <label for="perhitunganMargin" class="block mb-2 text-sm font-medium text-gray-900">Perhitungan Margin</label>
        <input type="text" id="perhitunganMargin" aria-label="disabled input 2" name="perhitunganMargin"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="Flat" disabled readonly>

        </select>
    </div>
    <div class="flex items-start mb-5">
        <div class="flex items-center h-5">
            <input id="terms" type="checkbox" value=""
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-300 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                required />
        </div>
        <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a
                href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
    </div>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kalkulasi</button>

</form>