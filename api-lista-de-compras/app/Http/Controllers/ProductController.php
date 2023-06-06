<?php

namespace App\Http\Controllers;

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
        ]);

        $product = $this->productService->createProduct($validatedData);

        return response()->json($product, 201);
    }

    // Implementar os outros metodos

}
