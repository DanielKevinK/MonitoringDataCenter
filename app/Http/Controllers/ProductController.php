<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('brand', 'asc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'ram' => 'required|integer',
            'processor' => 'required',
            'status' => 'required',
            'installation_date' => 'required|date'
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $product
        ], 201);
    }
     

    // Mengubah data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required',
            'brand' => 'sometimes|required',
            'ram' => 'sometimes|required|integer',
            'processor' => 'sometimes|required',
            'status' => 'sometimes|required',
            'installation_date' => 'sometimes|required|date',
        ]);

        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $product->update($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }

    public function getTotalActiveServerByStatus()
    {
        // Query untuk mendapatkan tim nelayan berdasarkan location_id
        $dataServer = Product::where('status', 'aktif')->get();
        $total = $dataServer->count();
        return response()->json([
            'status' => 'success',
            'total active server' => $total
        ]);
    }
}
