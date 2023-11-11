function onScanSuccess(decodedText, decodedResult) {
    console.log(`Kode cocok = ${decodedText}, hasil terdekripsi`);

    // Simpan data pemindaian di sessionStorage
    sessionStorage.setItem('scannedData', decodedText);

    $.ajax({
        url: '/mahasiswa/validate-scan',
        method: 'GET',
        data: {
            idQr: decodedText,
        },
        success: function(response){
            if(response.status == 'valid'){
                // Tampilkan pesan sukses dengan SweetAlert2
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'QR berhasil dipindai',
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
            }else if(response.status == 'invalid'){
                Swal.fire({
                    title: 'Gagal!',
                    text: 'QR untuk jadwal ini sudah invalid!',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'Selesai'

                }).then((result) => {
                    if (result.isConfirmed){
                        window.location.href = 'dashboard'
                    }
                });
            }else{
                Swal.fire({
                    title: 'Gagal!',
                    text: 'QR yang anda scan salah!',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: 'Selesai'

                }).then((result) => {
                    if (result.isConfirmed){
                        window.location.href = 'dashboard'
                    }
                });
            }

        }

    });
    html5QrcodeScanner.clear();
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