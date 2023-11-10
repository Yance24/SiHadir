function onScanSuccess(decodedText, decodedResult) {
    console.log(`Kode cocok = ${decodedText}, hasil terdekripsi`);

    // Simpan data pemindaian di sessionStorage
    sessionStorage.setItem('scannedData', decodedText);

    // Tampilkan pesan sukses dengan SweetAlert2
    Swal.fire({
        title: 'Berhasil!',
        text: 'Barcode berhasil dipindai',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Selesai',
        customClass: {
            confirmButton: 'btn btn-primary',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Alihkan ke halaman lain
            window.location.href = 'dashboard';
        }
    });
}

function onScanFailure(error) {
    console.log(`Kesalahan pemindaian kode = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
        qrbox: {
            width: 250,
            height: 250
        }
    },
    false);

html5QrcodeScanner.render(onScanSuccess, onScanFailure);