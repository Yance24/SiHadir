document
    .getElementById("logoutLink")
    .addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah perilaku default dari tag anchor

        Swal.fire({
            title: "Ingin keluar dari aplikasi?",
            icon: "warning",
            showCancelButton: true, // Menampilkan tombol "Batal"
            confirmButtonColor: "#7ACC78",
            cancelButtonColor: "#d33",
            confirmButtonText: "YA",
            cancelButtonText: "TIDAK",
            reverseButtons: true, // Memutar urutan tombol
        }).then((result) => {
            if (result.isConfirmed) {
                // Menangani klik tombol "Ya"
                Swal.fire("Anda telah keluar", "", "success");
                // Tambahkan fungsi logout atau redirect ke halaman logout di sini
                window.location.href = "../login"; // Ganti dengan URL logout Anda
            } else {
                // Menangani klik tombol "Batal"
                // Lakukan sesuatu atau berikan perilaku kustom
                Swal.close(); // Menutup popup Swal
            }
        });
    });
