<?php

namespace App\Repositories;

use App\Models\ShoppingList;

class ShoppingListRepository
{

    public function create(array $data)
    {
        return ShoppingList::create($data);
    }

    public function find($id)
    {
        return ShoppingList::findOrFail($id);
    }

    public function update(ShoppingList $shoppingList, array $data)
    {
        $shoppingList->update($data);
        return $shoppingList;
    }

    public function delete(ShoppingList $shoppingList)
    {
        $shoppingList->delete();
    }

}
