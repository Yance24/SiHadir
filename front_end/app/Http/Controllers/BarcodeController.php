namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function storeScannedData(Request $request)
    {
        // Ambil data barcode dari request
        $barcode = $request->input('barcode');

        // Lakukan pemrosesan atau simpan data sesuai kebutuhan
        // Contoh: Simpan data ke database atau lakukan pemrosesan lainnya

        // Berikan respons ke frontend
        return response()->json([
            'status' => 200,
            'message' => 'Data barcode berhasil diterima dan diproses di backend.',
            'data' => [
                'barcode' => $barcode,
            ],
        ]);
    }
}
