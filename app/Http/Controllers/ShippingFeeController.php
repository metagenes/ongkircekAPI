<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShippingFeeController extends Controller
{

    /**
     * getProvinces
     *
     * @return void
     */
    public function getProvinces()
    {
        
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIRAPI')
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinces = $response['rajaongkir']['results'];

        return response()->json([
            'success' => true,
            'message' => 'Get All Provinces',
            'data'    => $provinces    
        ]);
    }
    
    /**
     * getCities
     *
     * @param  mixed $id
     * @return void
     */
    public function getCities($id)
    {
        
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIRAPI')
        ])->get('https://api.rajaongkir.com/starter/city?&province='.$id.'');

        $cities = $response['rajaongkir']['results'];

        return response()->json([
            'success' => true,
            'message' => 'Get City By ID Provinces : '.$id,
            'data'    => $cities    
        ]);
    }
        
    /**
     * checkOngkir
     *
     * @param  mixed $request
     * @return void
     */
    public function shippingcheck(Request $request)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIRAPI')
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin'            => $request->origin,
            'destination'       => $request->destination,
            'weight'            => $request->weight,
            'courier'           => $request->courier
        ]);

        $ongkir = $response['rajaongkir']['results'];

        return response()->json([
            'success' => true,
            'message' => 'Result Cost Ongkir',
            'data'    => $ongkir    
        ]);
    }
}
