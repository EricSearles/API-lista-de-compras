<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/teste', [ProductController::class, 'teste'])->name('teste');

//Rotas disponiveis sem autenticação de usuario
Route::prefix('shopping-lists')->group(function () {
    Route::post('/', [ShoppingListController::class, 'create']);
    Route::post('/add-product', [ShoppingListController::class, 'addProduct']);
    Route::delete('/{shoppingListId}/products/{productId}', [ShoppingListController::class, 'removeProduct']);
    Route::get('/{shoppingListId}', [ShoppingListController::class, 'getShoppingList']);
    Route::put('/products/{productId}/increase-quantity', [ShoppingListController::class, 'increaseProductQuantity']);
    Route::put('/products/{productId}/decrease-quantity', [ShoppingListController::class, 'decreaseProductQuantity']);
    Route::post('/{shoppingListId}/duplicate', [ShoppingListController::class, 'duplicateShoppingList']);
});

Route::get('/testes', 'App\Http\Controllers\ProductController@teste');

Route::prefix('products')->group(function () {
    Route::post('/', [ProductController::class, 'create']);
    // Implementar outras rotas para produto.
});
