<?php
// Tipe Data String
$nama = "John";
$alamat = '123 Jalan Contoh';

// Tipe Data Integer
$umur = 30;
$nilai = -10;

// Tipe Data Float
$gaji = 2500.50;
$pi = 3.14159;

// Tipe Data Boolean
$isMarried = true;
$isStudent = false;

// Tipe Data Array
$buah = array("Apel", "Jeruk", "Mangga");

// Tipe Data Asosiatif
$pegawai = array("nama" => "Alice", "jabatan" => "Manajer", "gaji" => 5000);

// Tipe Data Objek
class Mobil
{
    public $merk;
    public $tahun;

    function __construct($merk, $tahun)
    {
        $this->merk = $merk;
        $this->tahun = $tahun;
    }

    function edittahun($years)
    {
        $this->tahun = $years;
    }
}

$mobil1 = new Mobil("Toyota", 2019);

// Tipe Data NULL
$nilaiKosong = null;

// Menampilkan Data
echo "Nama: $nama<br>";
echo "Alamat: $alamat<br>";
echo "Umur: $umur<br>";
echo "Gaji: $gaji<br>";
echo "Apakah menikah? " . ($isMarried ? "Ya" : "Tidak") . "<br>";
echo "Daftar Buah: " . implode(", ", $buah) . "<br>";
echo "Nama Pegawai: " . $pegawai["nama"] . "<br>";
echo "Jabatan:" . $pegawai["jabatan"] . "<br>";
echo "Merk Mobil: " . $mobil1->merk . "<br>";
echo "Tahun Mobil: " . $mobil1->tahun . "<br>";
echo "Data yang tidak memiliki nilai: " . ($nilaiKosong === null ? "Tidak ada nilai" : $nilaiKosong) . "<br>";
$mobil1->edittahun(2020);
echo "<br> ganti tahun mobil 1<br>";
echo "Tahun Mobil Baru: " . $mobil1->tahun . "<br>";
