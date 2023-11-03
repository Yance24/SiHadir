// Event handler untuk tombol logout
document.getElementById("logout").addEventListener("click", function () {
    Swal.fire({
        title: "Do you want to log out?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Log Out",
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            // Lakukan tindakan logout di sini
            Swal.fire("Logged Out!", "", "success");
        }
    });
});
