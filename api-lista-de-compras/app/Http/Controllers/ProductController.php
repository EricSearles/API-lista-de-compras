<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'list_id' => 'required|integer|min:1',
        ]);

        $product = $this->productService->createProduct($validatedData);

        return response()->json($product, 201);
    }

    public function teste()
    {
        $teste = 'TESTE';
        return $teste;
    }

    // Implementar os outros metodos

}
