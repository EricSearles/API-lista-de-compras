<?php

namespace App\Services;

use App\Repositories\ShoppingListRepository;
use App\Repositories\ProductRepository;

class ShoppingListService
{
    protected $shoppingListRepository;
    protected $productRepository;

    public function __construct(
        ShoppingListRepository $shoppingListRepository,
        ProductRepository $productRepository
    ) {
        $this->shoppingListRepository = $shoppingListRepository;
        $this->productRepository = $productRepository;
    }

    public function createShoppingList(array $data)
    {
        return $this->shoppingListRepository->create($data);
    }

    public function addProductToShoppingList($shoppingListId, array $data)
    {
        $shoppingList = $this->shoppingListRepository->find($shoppingListId);
        $product = $shoppingList->products()->create($data);
        return $product;
    }

    public function removeProductFromShoppingList($shoppingListId, $productId)
    {
        $shoppingList = $this->shoppingListRepository->find($shoppingListId);
        $product = $this->productRepository->find($productId);
        $product->delete();
    }

    public function getShoppingList($shoppingListId)
    {
        return $this->shoppingListRepository->find($shoppingListId);
    }

    public function increaseProductQuantity($productId)
    {
        $product = $this->productRepository->find($productId);
        $product->increment('quantity');
        return $product;
    }

    public function decreaseProductQuantity($productId)
    {
        $product = $this->productRepository->find($productId);
        $product->decrement('quantity');
        return $product;
    }

    public function duplicateShoppingList($shoppingListId)
    {
        $originalShoppingList = $this->shoppingListRepository->find($shoppingListId);
        $newShoppingList = $originalShoppingList->replicate();
        $newShoppingList->push();

        foreach ($originalShoppingList->products as $product) {
            $newShoppingList->products()->create($product->toArray());
        }

        return $newShoppingList;
    }

}
