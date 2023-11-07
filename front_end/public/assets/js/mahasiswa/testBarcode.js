if (navigator.serviceWorker) {
    navigator.serviceWorker.register(
        `${window.location.pathname}{{asset('assets/js/sw.js')}`,
        {
            scope: window.location.pathname,
        }
    );
}

const barcodeDetector =
    "BarcodeDetector" in window ? new BarcodeDetector() : null;

(async () => {
    if (!barcodeDetector) {
        document.querySelector(".console").innerText =
            "BarcodeDetector is not supported in this browser";
        return;
    }

    try {
        const mediaStream = await navigator.mediaDevices.getUserMedia({
            audio: false,
            video: {
                facingMode: "environment",
            },
        });

        const video = document.querySelector("video");
        video.srcObject = mediaStream;

        video.onloadedmetadata = (e) => {
            video.play();
        };

        while (true) {
            await new Promise((resolve) => setTimeout(resolve, 100));
            if (video.readyState !== 4) continue;
            const results = await barcodeDetector.detect(video);
            if (results.length > 0) {
                const result = results[0].rawValue || null;
                document.querySelector(".console").innerText = result;

                // Show SweetAlert notification and redirect to backend after user interaction
                showScanSuccessNotification(result);
            } else {
                document.querySelector(".console").innerText = "";
            }
        }
    } catch (error) {
        console.error("Error accessing camera:", error);
        document.querySelector(".console").innerText =
            "Error accessing camera.";
    }
})();

function showScanSuccessNotification(result) {
    Swal.fire({
        icon: "success",
        title: "Scan Success",
        text: `Scanned result: ${result}`,
        showConfirmButton: false,
    });

    // Redirect to backend after 3 seconds
    setTimeout(() => {
        // Modify the URL as needed to redirect to your backend
        const backendUrl = "https://example.com/backend"; // Replace with your backend URL
        window.location.href = `${backendUrl}?result=${encodeURIComponent(
            result
        )}`;
    }, 3000);
}