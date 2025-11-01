

<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function getNearbyProducts(Request $request, $category_id)
    {
        // ✅ Validate request
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'nullable|numeric' // optional (default 50km)
        ]);

        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = $request->radius ?? 50; // default radius = 50 KM

        // ✅ Haversine formula to calculate distance
        $products = Product::select('*', DB::raw("(
            6371 * acos(
                cos(radians($latitude)) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians($longitude)) +
                sin(radians($latitude)) *
                sin(radians(latitude))
            )
        ) AS distance"))
        ->where('category_id', $category_id)
        ->having('distance', '<=', $radius)
        ->orderBy('distance', 'asc')
        ->get();

        return response()->json([
            'status' => true,
            'message' => 'Nearby products fetched successfully',
            'count' => count($products),
            'data' => $products
        ]);
    }
}
