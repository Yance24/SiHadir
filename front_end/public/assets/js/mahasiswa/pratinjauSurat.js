// Function untuk menampilkan pratinjau PDF
document.getElementById('pratinjauButton').addEventListener('click', function() {
    const fileName = document.querySelector('.custom-file-label').textContent;
    if (fileName.endsWith('.pdf')) {
        const pdfURL = 'https://path/to/your/pdf/files/' + fileName; // Gantilah dengan URL PDF yang sesuai
        const pdfViewer = document.getElementById('pdfViewer');
        pdfViewer.src = pdfURL;
        document.getElementById('pratinjauContainer').style.display = 'block';
        this.style.display = 'none';
        document.getElementById('tutupPratinjauButton').style.display = 'block';
    } else {
        alert('Berkas harus berformat PDF untuk dapat dilihat.');
    }
});

// Function untuk menutup pratinjau PDF
document.getElementById('tutupPratinjauButton').addEventListener('click', function() {
    document.getElementById('pratinjauContainer').style.display = 'none';
    document.getElementById('pdfViewer').src = '';
    this.style.display = 'none';
    document.getElementById('pratinjauButton').style.display = 'block';
});