<h1 class="text-2xl font-bold text-center">Customer Service</h1>
<form action="index.php?target=terima" method="post" enctype="multipart/form-data" class="form max-w-lg mx-auto">
    <label for="fnama" class="block mb-2">Nama</label>
    <input type="text" name="fnama" id="fnama"
        class="block w-full border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-blue-500"
        required />
    <label for="email" class="block mb-2">Email</label>
    <input type="email" name="email" id="email"
        class="block w-full border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-blue-500"
        required />
    <label for="nohp" class="block mb-2">No.Telp</label>
    <input type="number" name="nohp" id="nohp"
        class="block w-full border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-blue-500"
        required />
    <label for="perangkat" class="block mb-2">Perangkat</label>
    <div class="flex mb-4">
        <input type="radio" name="perangkat" id="laptop" value="Laptop" class="mr-2" />
        <label for="laptop">Laptop</label>
        <input type="radio" name="perangkat" id="smartphone" value="Smartphone" class="mr-2 ml-4" />
        <label for="smartphone">Smartphone</label>
        <input type="radio" name="perangkat" id="tablet" value="Tablet" class="mr-2 ml-4" />
        <label for="tablet">Tablet</label>
    </div>
    <label for="layanan" class="block mb-2">Layanan</label>
    <select name="layanan" id="layanan"
        class="block w-full border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-blue-500">
        <option value="Perbaikan">Perbaikan</option>
        <option value="Penggantian">Penggantian</option>
        <option value="pertanyaan">Pertanyaan Teknis</option>
    </select>
    <div class="mb-4">
        <label for="garansi" class="flex items-center cursor-pointer">
            <input type="checkbox" checked name="garansi" id="garansi" class="mr-2" />
            <span>Aktif</span>
        </label>
    </div>
    <label for="tanggal" class="block mb-2">Tanggal Pembelian</label>
    <input type="date" name="tanggal" id="tanggal"
        class="block w-full border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-blue-500" />
    <label class="block mb-2" for="gambar">Upload Gambar</label>
    <input type="file" id="gambar" name="gambar"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

    <label for="keterangan" class="block mb-2">Keterangan</label>
    <textarea name="keterangan" id="keterangan" cols="30" rows="5"
        class="block w-full border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:border-blue-500"></textarea>
    <button
        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
</form>