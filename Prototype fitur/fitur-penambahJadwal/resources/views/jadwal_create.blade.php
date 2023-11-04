<form action="/jadwal" method="POST">
    @csrf
    <label for="id_jadwal">ID Jadwal:</label>
    <input type="text" name="id_jadwal">

    <label for="id_makul">ID Mata Kuliah:</label>
    <input type="text" name="id_makul">

    <label for="id_userdosen">ID User Dosen:</label>
    <input type="text" name="id_userdosen">

    <label for="id_semester">ID Semester:</label>
    <input type="text" name="id_semester">

    <label for="id_tahunajar">ID Tahun Ajar:</label>
    <input type="text" name="id_tahunajar">

    <label for="hari">Hari:</label>
    <input type="text" name="hari">

    <label for="kelas">Kelas:</label>
    <input type="text" name="kelas">

    <label for="jam_mulai">Jam Mulai:</label>
    <input type="text" name="jam_mulai">

    <label for="jam_selesai">Jam Selesai:</label>
    <input type="text" name="jam_selesai">

    <button type="submit">Buat Jadwal</button>
</form>