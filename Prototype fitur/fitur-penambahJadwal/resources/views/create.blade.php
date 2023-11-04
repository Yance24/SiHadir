<form action="/jadwal" method="POST">
    @csrf
    <label for="id_makul">ID Mata Kuliah:</label>
    <input type="text" name="id_makul">
    <!-- Tambahkan bidang formulir lainnya untuk data jadwal -->

    <button type="submit">Buat Jadwal</button>
</form>