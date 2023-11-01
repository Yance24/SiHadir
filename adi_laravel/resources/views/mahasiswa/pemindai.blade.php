<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        html,
        body {
            height: 100%;
            background: #000;
        }

        video {
            object-fit: cover;
            background: #000;
            width: 100%;
            height: 100%;
        }

        .console {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            min-height: 15vh;
            padding: 0.5rem 1rem;
            word-break: break-all;
            font-size: 1.25rem;
            color: #fff;
            text-shadow: 0 0 0.25rem #000, 0 0 0.25rem #000, 0 0 0.25rem #000;
            background-color: rgba(0, 0, 0, 0.7);
            border-top: 0.0625rem solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0.25rem #000;
        }
    </style>
</head>

<body>
    <div>
        <video playsinline></video>
        <div class="console">
            <h1>Scan QR Code Absensi yang dibagikan!</h1>
        </div>
    </div>
</body>
<script>
    if (navigator.serviceWorker) {
        navigator.serviceWorker.register(`${window.location.pathname}{{asset('assets/js/sw.js')}`, {
            scope: window.location.pathname,
        });
    }

    const barcodeDetector = "BarcodeDetector" in window ? new BarcodeDetector() : null;
    let result;

    (async () => {
        if (!barcodeDetector) {
            document.querySelector(".console").innerText = "BarcodeDetector is not supported in this browser";
            return;
        }

        const mediaStream = await navigator.mediaDevices.getUserMedia({
            audio: false,
            video: {
                facingMode: "environment"
            },
        });

        const video = document.querySelector("video");
        video.srcObject = mediaStream;
        video.onloadedmetadata = (e) => {
            video.play();
        };

        while (true) {
            await new Promise((resolve) => setTimeout(resolve, 100));
            if (document.querySelector("video").readyState !== 4) continue;
            const results = await barcodeDetector.detect(document.querySelector("video"));
            if (results.length) {
                result = results[0]?.rawValue ?? null;
                document.querySelector(".console").innerText = result;

                // Display a success alert using SweetAlert2
                Swal.fire({
                    title: 'Berhasil absen!',
                    icon: 'success',
                }).then(async () => {
                    // Kirim data hasil pemindaian ke backend
                    const dataToSend = {
                        scannedData: result, // result adalah hasil pemindaian
                    };

                    try {
                        const response = await fetch('/backend-endpoint', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(dataToSend),
                        });

                        if (response.ok) {
                            // Redirect to the dashboard
                            window.location.href = "/dashboard";
                        } else {
                            console.error('Gagal mengirim data ke backend');
                            // Handle kesalahan jika diperlukan
                        }
                    } catch (error) {
                        console.error('Terjadi kesalahan dalam mengirim data ke backend', error);
                        // Handle kesalahan jika diperlukan
                    }
                });
            } else {
                document.querySelector(".console").innerText = "";
            }
        }
    })();

    document.querySelector(".console").addEventListener("click", async (e) => {
        if (!result) return;
        if (result.match(/https?:\/\//)) {
            if (confirm(`Open URL?\n${result}`)) {
                window.open(result);
            }
        }
        await navigator.clipboard.writeText(result);
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>
