<?php
// Contoh sederhana, Anda bisa menyesuaikan dengan logika atau proses yang diinginkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir POST jika ada
    if (isset($_POST['parameter_name'])) {
        $parameter_value = $_POST['parameter_name'];
        // Lakukan sesuatu dengan nilai parameter yang diterima
        echo "Nilai parameter yang diterima: " . $parameter_value;
    } else {
        echo "Parameter tidak ditemukan";
    }
} else {
    echo "Akses langsung ke halaman ini tidak diizinkan";
}
