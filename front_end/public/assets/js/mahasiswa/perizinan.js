// Get references to elements
const pratinjauButton = document.getElementById("pratinjauButton");
const pdfCanvas = document.getElementById("pdfCanvas");
const pdfPreview = document.getElementById("pdfPreview");

// Function to handle the file input change
fileInput.addEventListener("change", function() {
    const file = this.files[0];

    if (file) {
        const fileName = file.name;

        if (fileName.endsWith(".pdf")) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const pdfData = event.target.result;

                // Save the PDF data to web storage
                sessionStorage.setItem("cachedPDF", pdfData);

                // Enable the "Pratinjau" button after a PDF is uploaded
                pratinjauButton.disabled = false;
            };
            reader.readAsDataURL(file);
        } else {
            alert("Berkas harus berformat PDF untuk dapat dilihat.");
        }
    }
});

// Function to trigger file input by clicking the paperclip icon
document.querySelector(".fa-paperclip").addEventListener("click", function() {
    fileInput.click();
});

// Function to open the popup
pratinjauButton.addEventListener("click", function() {
    document.getElementById("pdfPopup").style.display = "block";
    previewPDF();
});

// Function to close the popup
document.getElementById("closePopupButton").addEventListener("click", function() {
    document.getElementById("pdfPopup").style.display = "none";
});

function previewPDF() {
    const cachedPDF = sessionStorage.getItem("cachedPDF");

    if (cachedPDF) {
        // Get the canvas element to display the PDF
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");
        pdfPreview.appendChild(canvas);

        // Use PDF.js to render the PDF
        const pdfData = atob(cachedPDF.split(",")[1]); // Decode PDF data
        const loadingTask = pdfjsLib.getDocument({
            data: pdfData
        });

        loadingTask.promise.then(function(pdf) {
            pdf.getPage(1).then(function(page) {
                const viewport = page.getViewport({
                    scale: 1
                });
                const scale = pdfPreview.offsetWidth / viewport.width;

                canvas.height = viewport.height * scale;
                canvas.width = pdfPreview.offsetWidth;

                const renderContext = {
                    canvasContext: context,
                    viewport: page.getViewport({
                        scale
                    })
                };

                page.render(renderContext).promise.then(function() {
                    pdfPreview.style.display = "block";
                });
            });
        });
    } else {
        alert("Belum ada file PDF yang diunggah.");
    }
}

// view name file input
function displayFileName() {
    var fileInput = document.getElementById('fileInput');
    var fileNameInput = document.getElementById('fileName');

    // Periksa apakah pengguna telah memilih berkas
    if (fileInput.files.length > 0) {
        var fileName = fileInput.files[0].name;
        fileNameInput.value = fileName; // Setel nilai input dengan nama berkas
    } else {
        fileNameInput.value = ''; // Kosongkan nilai input jika tidak ada berkas yang dipilih
    }
}

// Tambahkan event listener ke input file untuk mendeteksi perubahan
var fileInput = document.getElementById('fileInput');
fileInput.addEventListener('change', displayFileName);