<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ShoppingList;
use App\Services\ShoppingListService;
use App\Repositories\ShoppingListRepository;

class ShoppingListTest
{
    public function testCreateShoppingList()
    {
        $shoppingListData = [
            'title' => 'My Shopping List',
        ];

        $shoppingListRepositoryMock = $this->createMock(ShoppingListRepository::class);
        $shoppingListRepositoryMock->expects($this->once())
            ->method('create')
            ->with($shoppingListData)
            ->willReturn(new ShoppingList($shoppingListData));

        $shoppingListService = new ShoppingListService($shoppingListRepositoryMock);
        $shoppingList = $shoppingListService->createShoppingList($shoppingListData);

        $this->assertInstanceOf(ShoppingList::class, $shoppingList);
        $this->assertEquals('My Shopping List', $shoppingList->title);
    }
}
