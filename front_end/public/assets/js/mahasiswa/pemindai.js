(adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6724419004010752",
    enable_page_level_ads: true,
});

window.dataLayer = window.dataLayer || [];
function gtag() {
    dataLayer.push(arguments);
}
gtag("js", new Date());
gtag("config", "UA-131906273-1");

var scanner = new Instascan.Scanner({
    video: document.getElementById("preview"),
    scanPeriod: 5,
    mirror: false,
});
scanner.addListener("scan", function (content) {
    alert(content);
    //window.location.href=content;
});
Instascan.Camera.getCameras()
    .then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
            $('[name="options"]').on("change", function () {
                if ($(this).val() == 1) {
                    if (cameras[0] != "") {
                        scanner.start(cameras[0]);
                    } else {
                        alert("No Front camera found!");
                    }
                } else if ($(this).val() == 2) {
                    if (cameras[1] != "") {
                        scanner.start(cameras[1]);
                    } else {
                        alert("No Back camera found!");
                    }
                }
            });
        } else {
            console.error("No cameras found.");
            alert("No cameras found.");
        }
    })
    .catch(function (e) {
        console.error(e);
        alert(e);
    });
