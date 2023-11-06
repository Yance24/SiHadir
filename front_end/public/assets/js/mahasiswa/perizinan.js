// Get references to elements
const pratinjauButton = document.getElementById("pratinjauButton");
const pdfCanvas = document.getElementById("pdfCanvas");
const pdfPreview = document.getElementById("pdfPreview");

// Function to handle the file input change
const fileInput = document.getElementById("fileInput");
const fileNameInput = document.getElementById("fileName");
const sendButton = document.getElementById("sendButton");
let pdfData = null;

fileInput.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const fileName = file.name;

        if (fileName.endsWith(".pdf")) {
            const reader = new FileReader();
            reader.onload = function (event) {
                pdfData = event.target.result;

                // Save the PDF data to Web Storage
                sessionStorage.setItem("cachedPDF", pdfData);

                // Enable the "Pratinjau" button after a PDF is uploaded
                pratinjauButton.disabled = false;
                fileNameInput.value = fileName;
            };
            reader.readAsDataURL(file);
        } else {
            alert("Berkas harus berformat PDF untuk dapat dilihat.");
        }
    }
});

document.querySelector(".fa-paperclip").addEventListener("click", function () {
    fileInput.click();
});

pratinjauButton.addEventListener("click", function () {
    const cachedPDF = sessionStorage.getItem("cachedPDF");
    let currentScale = 1; // Skala awal
    let stepSize = 0.15; // Ukuran langkah zoom (15%)

    if (cachedPDF) {
        Swal.fire({
            title: "Pratinjau PDF",
            html:
                '<div style="display: flex; flex-direction: column; align-items: center; height: 100%;">' +
                '<div style="overflow: auto; max-width: 100%; max-height: 80vh;">' +
                '<canvas id="pdfCanvas" style="width: 100%;"></canvas>' +
                "</div>" +
                '<progress id="zoomProgressBar" value="0" max="100"></progress>' +
                '<div style="display: flex; margin-top: 10px;">' +
                '<button id="zoomInButton" class="btn btn-secondary">Zoom In</button>' +
                '<button id="zoomOutButton" class="btn btn-secondary" style="margin-left: 10px;">Zoom Out</button>' +
                "</div></div>",
            showCloseButton: true,
            focusConfirm: false,
            willOpen: function () {
                const canvas = document.getElementById("pdfCanvas");
                const context = canvas.getContext("2d");
                const progressBar = document.getElementById("zoomProgressBar");

                const pdfData = atob(cachedPDF.split(",")[1]);
                const loadingTask = pdfjsLib.getDocument({
                    data: pdfData,
                });

                loadingTask.promise.then(function (pdf) {
                    function renderPage(page) {
                        const viewport = page.getViewport({
                            scale: currentScale,
                        });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;
                        const renderContext = {
                            canvasContext: context,
                            viewport: viewport,
                        };
                        page.render(renderContext).promise.then(function () {
                            // SweetAlert2 akan menangani tampilan canvas
                        });
                    }

                    pdf.getPage(1).then(function (page) {
                        renderPage(page);

                        // Tombol zoom in
                        document
                            .getElementById("zoomInButton")
                            .addEventListener("click", function () {
                                currentScale += stepSize;
                                if (currentScale > 2) {
                                    currentScale = 2; // Batas maksimum skala
                                }
                                updateZoomStatus();
                                renderPage(page);
                            });

                        // Tombol zoom out
                        document
                            .getElementById("zoomOutButton")
                            .addEventListener("click", function () {
                                currentScale -= stepSize;
                                if (currentScale < stepSize) {
                                    currentScale = stepSize; // Batas minimum skala
                                }
                                updateZoomStatus();
                                renderPage(page);
                            });

                        function updateZoomStatus() {
                            const percentage =
                                ((currentScale - stepSize) / (2 - stepSize)) *
                                100;
                            progressBar.value = percentage;
                        }
                    });
                });
            },
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    "Surat Telah Dikirim",
                    "Surat akan dikirimkan ke Dosen",
                    "success"
                );

                // Mengambil data PDF dari session
                const pdfData = atob(cachedPDF.split(",")[1]);

                // Simpan data PDF ke variabel FormData
                const formData = new FormData();
                formData.append(
                    "pdfFile",
                    new Blob([pdfData], {
                        type: "application/pdf",
                    }),
                    "nama_berkas.pdf"
                );

                // Kirim data PDF ke backend dengan menggunakan metode fetch atau XMLHttpRequest
                fetch("URL_BACKEND", {
                    method: "POST",
                    body: formData,
                })
                    .then((response) => {
                        if (response.ok) {
                            // Berhasil mengirim data PDF
                            console.log(
                                "Data PDF berhasil dikirim ke backend."
                            );
                        } else {
                            console.error(
                                "Gagal mengirim data PDF ke backend."
                            );
                        }
                    })
                    .catch((error) => {
                        console.error(
                            "Gagal mengirim data PDF ke backend: " + error
                        );
                    });

                // Hapus sesi PDF yang diunggah
                sessionStorage.removeItem("cachedPDF");

                // Tunggu 3 detik sebelum pindah ke halaman dashboard
                setTimeout(function () {
                    window.location.href = "dashboard";
                }, 3000);
            }
        });
    } else {
        Swal.fire("Peringatan", "Belum ada file PDF yang diunggah.", "warning");
    }
});

function displayFileName() {
    if (fileInput.files.length > 0) {
        const fileName = fileInput.files[0].name;
        fileNameInput.value = fileName;
    }
}

// Tambahkan event listener ke input file untuk mendeteksi perubahan
fileInput.addEventListener("change", displayFileName);

// Cek apakah pengguna sudah mengunggah file sebelumnya saat halaman dimuat
const initialPDF = sessionStorage.getItem("cachedPDF");
if (initialPDF) {
    pratinjauButton.disabled = false;
}
