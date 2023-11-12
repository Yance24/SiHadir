function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    var appbar = document.querySelector('.appbar');
    var menuToggle = document.querySelector('#menuToggle');
    var content = document.getElementById('content'); // Added content reference

    if (menuToggle.checked) {
        sidebar.style.width = '350px';
        appbar.style.marginLeft = '350px';
        content.style.marginLeft = '350px'; // Adjust content margin
    } else {
        sidebar.style.width = '0';
        appbar.style.marginLeft = '0';
        content.style.marginLeft = '0'; // Reset content margin
    }
}

// Event handler for the logout button
document.getElementById('logout').addEventListener('click', function() {
    Swal.fire({
        text: 'Do you want to log out?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: `Tidak`,
        cancelButtonColor: '#CC7878',
        confirmButtonColor: '#7ACC78',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/logout';
        }
    });
});