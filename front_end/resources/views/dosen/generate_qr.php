<?php

namespace App\Http\Controllers;

use QRCode;

class YourController extends Controller
{
    public function generateQRCode()
    {
        // Generate QR code and return it as a response
        $qrCode = QRCode::format('png')->size(200)->generate('Your QR Code Data');

        return response($qrCode)->header('Content-Type', 'image/png');
    }
}

?>
