function onScanSuccess(decodedText, decodedResult) {
    console.log(`code matched = ${decodedText}, decodedResult`);

    // Display SweetAlert2 success message
    Swal.fire({
        title: 'Success!',
        text: 'Barcode scanned successfully',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Done',
        customClass: {
            confirmButton: 'btn btn-primary',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to the dashboard page or perform any other action
            // For now, just reload the page
            location.reload();
        }
    });
}

function onScanFailure(error) {
    console.log(`Code scan error = ${error}`);
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