<?php
// Pastikan formulir telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $harga_barang = $_POST["hargabarang"];
    $uang_muka = $_POST["uangmuka"];
    $tenor = $_POST["tenor"];
    $margin = 8; // Hilangkan tanda persen dari nilai margin
    $perhitungan_margin = 'Flat';

    // Periksa nilai DP
    if ($uang_muka < 30) {
        echo '
        <div class="flex items-center justify-center h-screen">
            <div id="alert-additional-content-2" class="w-1/3 p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <h3 class="text-lg font-medium">Peringatan</h3>
                </div>
                <div class="mt-2 mb-4 text-sm">
                    DP Anda Kurang dari 30%
                </div>
                <div class="flex justify-center">
                    <a type="button" href="index.php?target=cart" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>'; // Sintaksis PHP harus dalam tanda kutip
    } elseif ($uang_muka > 100) {
        echo '
        <div class="flex items-center justify-center h-screen">
            <div id="alert-additional-content-2" class="w-1/3 p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <h3 class="text-lg font-medium">Peringatan</h3>
                </div>
                <div class="mt-2 mb-4 text-sm">
                    DP Lebih Dari 100%
                </div>
                <div class="flex justify-center">
                    <a type="button" href="index.php?target=cart" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>';
    } else {
        $DP = $uang_muka / 100 * $harga_barang;
        $formatted_harga_barang = "Rp " . number_format($harga_barang, 0, ',', '.');
        $formatted_uang_muka = "Rp " . number_format($DP, 0, ',', '.');
        $data = array(
            'Harga Barang' => $formatted_harga_barang,
            'DP (%)' => $uang_muka . " %", // Tambahkan pesan DP jika ada
            'Uang Muka' => $formatted_uang_muka,
            'Jangka Waktu' => $tenor . " Tahun",
            'Margin' => $margin . " %", // Tambahkan kembali tanda persen setelah format angka
            'Perhitungan Margin' => $perhitungan_margin
        );

        // KPR
        $plafon_pinjaman = $harga_barang - $DP;
        $angsuran = $plafon_pinjaman / ($tenor * 12);
        $bunga = $angsuran * ($margin / 100); // Gunakan nilai margin tanpa tanda persen
        $periode = $tenor * 12 . ' Bulan';

        $f_plafon_pinjaman = "Rp " . number_format($plafon_pinjaman, 0, ',', '.');
        $f_angsuran = "Rp " . number_format($angsuran, 0, ',', '.');
        $KPR = array(
            'Plafon Pinjaman' => $f_plafon_pinjaman,
            'Angsuran per Periode' => $f_angsuran,
            'Bunga per Bulan' => "Rp " . number_format($bunga, 0, ',', '.'), // Format nilai bunga dengan Rp
            'Total periode' => $periode

        );

        // angsuran
        $tabelAngsuran = array();
        $sisa_pinjaman = $plafon_pinjaman;

        for ($i = 1; $i <= $tenor * 12; $i++) {
            $angsuran_pokok = $angsuran;
            $angsuran_bunga = $plafon_pinjaman * ($margin / 100) / 12; // Gunakan nilai margin tanpa tanda persen
            $total_angsuran = $angsuran_pokok + $angsuran_bunga;
            $sisa_pinjaman -= $angsuran_pokok;
            $tabelAngsuran[] = array(
                'Bulan' => $i,
                'Margin Angsuran' => "Rp " . number_format($bunga, 0, ',', '.'), // Gunakan nilai margin awal
                'Angsuran Pokok' => "Rp " . number_format($angsuran_pokok, 0, ',', '.'),
                'Total Angsuran' => "Rp " . number_format($total_angsuran, 0, ',', '.'),
                'Sisa Pinjaman' => "Rp " . number_format(max(0, $sisa_pinjaman), 0, ',', '.') // Pastikan sisa pinjaman tidak negatif
            );
        }

        // Menampilkan hasil input di sini
        echo '
        <h1 class="text-center p-2 text-xl font-bold">Data Anda</h1>
        <div class=" w-full relative overflow-x-auto flex justify-center">
            <table class=" w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <tbody>';
        $count = 0; // Inisialisasi variabel hitung
        foreach ($data as $key => $value):
            $count++; // Increment hitung setiap iterasi
            echo '
                        <tr class="' . ($count % 2 == 0 ? 'bg-gray-700' : 'bg-white dark:bg-gray-800') . '">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $key . '</th>
                            <td class="px-6 py-4">' . $value . '</td>
                        </tr>';
        endforeach;
        echo '</tbody>
            </table>
        </div>';

        // KPR Anda
        echo '
        <h1 class="text-center p-2 text-xl font-bold">KPR Anda</h1>
        <div class=" w-full relative overflow-x-auto flex justify-center">
            <table class=" w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <tbody>';
        $count = 0; // Inisialisasi variabel hitung
        foreach ($KPR as $key => $value):
            $count++; // Increment hitung setiap iterasi
            echo '
                        <tr class="' . ($count % 2 == 0 ? 'bg-gray-700' : 'bg-white dark:bg-gray-800') . '">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $key . '</th>
                            <td class="px-6 py-4">' . $value . '</td>
                        </tr>';
        endforeach;
        echo '</tbody>
            </table>
        </div>';

        // Tabel Angsuran
        echo '
        <h1 class="text-center p-2 text-xl font-bold">Tabel Angsuran</h1>
        <div class=" w-full relative overflow-x-auto flex justify-center">
            <table class=" w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-6 py-3 text-left">Bulan</th>
                        <th class="px-6 py-3 text-left">Margin Angsuran</th>
                        <th class="px-6 py-3 text-left">Angsuran Pokok</th>
                        <th class="px-6 py-3 text-left">Total Angsuran</th>
                        <th class="px-6 py-3 text-left">Sisa Pinjaman</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($tabelAngsuran as $angsuran):
            $count++;
            echo '
                        <tr class="' . ($count % 2 == 0 ? 'bg-gray-800' : 'bg-white dark:bg-gray-700') . '">
                            <td class="px-6 py-4">' . $angsuran['Bulan'] . '</td>
                            <td class="px-6 py-4">' . $angsuran['Margin Angsuran'] . '</td>
                            <td class="px-6 py-4">' . $angsuran['Angsuran Pokok'] . '</td>
                            <td class="px-6 py-4">' . $angsuran['Total Angsuran'] . '</td>
                            <td class="px-6 py-4">' . $angsuran['Sisa Pinjaman'] . '</td>
                        </tr>';
        endforeach;
        echo '</tbody>
            </table>
        </div>';
    }
}
?>