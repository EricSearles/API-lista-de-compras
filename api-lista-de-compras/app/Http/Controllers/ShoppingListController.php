<?php

namespace App\Http\Controllers;

use App\Services\ShoppingListService;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{

    protected $shoppingListService;

    public function __construct(ShoppingListService $shoppingListService)
    {
        $this->shoppingListService = $shoppingListService;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $shoppingList = $this->shoppingListService->createShoppingList($validatedData);

        return response()->json($shoppingList, 201);
    }

    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'list_id' => 'required|integer|min:1',
        ]);


        $product = $this->shoppingListService->addProductToShoppingList($validatedData);

        return response()->json($product, 201);
    }

    public function removeProduct(Request $request)
    {

        $validatedData = $request->validate([
            'product_id' => 'required|integer|min:1',
            'list_id' => 'required|integer|min:1',
        ]);


        $this->shoppingListService->removeProductFromShoppingList($validatedData);

        return response()->json(null, 204);
    }

    public function getShoppingList($shoppingListId)
    {
        $shoppingList = $this->shoppingListService->getShoppingList($shoppingListId);

        return response()->json($shoppingList);
    }

    public function increaseProductQuantity($productId)
    {
        $product = $this->shoppingListService->increaseProductQuantity($productId);

        return response()->json($product);
    }

    public function decreaseProductQuantity($productId)
    {
        $product = $this->shoppingListService->decreaseProductQuantity($productId);

        return response()->json($product);
    }

    public function duplicateShoppingList($shoppingListId)
    {
        $newShoppingList = $this->shoppingListService->duplicateShoppingList($shoppingListId);

        return response()->json($newShoppingList, 201);
    }

}
