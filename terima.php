<?php
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai-nilai dari form
    $nama = $_POST['fnama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $perangkat = $_POST['perangkat'];
    $layanan = $_POST['layanan'];
    $garansi = isset($_POST['garansi']) ? "Aktif" : "Tidak Aktif";
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    
    $file_info = "No file uploaded";

    // Cek apakah file telah diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        // Proses file yang diunggah
        $file_name = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $file_destination = 'uploads/' . $file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            $file_info = "File uploaded successfully";
            // Simpan nama file gambar dalam variabel
            $nama_file_gambar = $file_name;
        } else {
            $file_info = "Failed to move file";
        }
    } elseif (isset($_FILES['gambar']) && $_FILES['gambar']['error'] !== UPLOAD_ERR_NO_FILE) {
        // Jika terdapat error selain file tidak diunggah, beri informasi error
        $file_info = "File upload failed: Error code " . $_FILES['gambar']['error'];
    }

    // Memasukkan nilai-nilai ke dalam sebuah array
    $data = array(
        'Nama' => $nama,
        'Email' => $email,
        'Nomor HP' => $nohp,
        'Perangkat' => $perangkat,
        'Layanan' => $layanan,
        'Garansi' => $garansi,
        'Tanggal' => $tanggal,
        'Keterangan' => $keterangan,
        'File Info' => $file_info,
        'Bukti Pembayaran' => isset($nama_file_gambar) ? $nama_file_gambar : "No file uploaded" 
    );
    ?>
    <h1 class="text-center p-2 text-xl font-bold">HASIL INPUT</h1>
    <div class=" w-full relative overflow-x-auto flex justify-center">
        <table class=" w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
            <tbody>
                <?php
                $count = 0; // Inisialisasi variabel hitung
                foreach ($data as $key => $value):
                    $count++; // Increment hitung setiap iterasi
                    ?>
                    <tr class="<?php echo $count % 2 == 0 ? 'bg-gray-700' : 'bg-white dark:bg-gray-800'; ?>">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo $key; ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php 
                            // Jika kunci adalah 'Nama File Gambar', tampilkan gambar
                            if ($key === 'Bukti Pembayaran') {
                                echo '<img src="uploads/' . $value . '" alt="Uploaded Image" style="max-width: 200px; max-height: 200px;">';
                            } else {
                                echo $value;
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
}
?>
