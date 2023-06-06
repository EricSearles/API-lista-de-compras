<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Services\ProductService;
use App\Repositories\ProductRepository;

class ProductTest
{

    public function testCreateProduct()
    {
        $productData = [
            'name' => 'Apple',
            'quantity' => 5,
        ];

        $productRepositoryMock = $this->createMock(ProductRepository::class);
        $productRepositoryMock->expects($this->once())
            ->method('create')
            ->with($productData)
            ->willReturn(new Product($productData));

        $productService = new ProductService($productRepositoryMock);
        $product = $productService->createProduct($productData);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('Apple', $product->name);
        $this->assertEquals(5, $product->quantity);
    }

}
