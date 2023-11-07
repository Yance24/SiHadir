// Pada file JavaScript Anda (pemindai.js)
let selectedDeviceId = null;
const codeReader = new ZXing.BrowserMultiFormatReader();
const sourceSelect = $("#pilihKamera");

$(document).on("change", "#pilihKamera", function () {
    selectedDeviceId = $(this).val();
    if (codeReader) {
        codeReader.reset();
        initScanner();
    }
});

function initScanner() {
    codeReader
        .listVideoInputDevices()
        .then((videoInputDevices) => {
            if (videoInputDevices.length > 0) {
                if (selectedDeviceId === null) {
                    selectedDeviceId = videoInputDevices[0].deviceId;
                }

                sourceSelect.html(""); // Clear the options before adding new ones.
                videoInputDevices.forEach((element) => {
                    const sourceOption = document.createElement("option");
                    sourceOption.text = element.label;
                    sourceOption.value = element.deviceId;
                    if (element.deviceId === selectedDeviceId) {
                        sourceOption.selected = true;
                    }
                    sourceSelect.append(sourceOption);
                });

                codeReader
                    .decodeFromVideoDevice(selectedDeviceId, "previewKamera", (result) => {
                        // Handle the scanned result
                        console.log(result.text);
                        $("#hasilscan").val(result.text);

                        // Continue scanning after a short delay
                        setTimeout(initScanner, 1000);
                    })
                    .catch((err) => {
                        console.error(err);
                        alert("Error accessing camera or scanning.");
                    });
            } else {
                alert("No video input devices found.");
            }
        })
        .catch((err) => {
            console.error(err);
            alert("Error listing video input devices.");
        });
}

if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    initScanner();
} else {
    alert("Cannot access camera. Make sure your browser supports getUserMedia and has necessary permissions.");
}