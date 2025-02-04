<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Получение данных о всех товарах
    public function index() {
        $products = Product::all();
        return response()->json($products)->setStatusCode(200);
    }

    // Получение данных о конкретном товаре (для ресурсного маршрута)
    public function show(Product $product) {
        return response()->json($product)->setStatusCode(200);
    }

    // Создание нового товара
    public function store(ProductRequest $request) {
        $product = Product::create($request->validated());
        return response()->json($product)->setStatusCode(201);
    }

    // Обновление товара (для ресурсного маршрута)
    public function update(ProductRequest $request, Product $product) {
        $product->update($request->validated());
        return response()->json($product)->setStatusCode(200);
    }

    // Удаление товара (для ресурсного маршрута)
    public function destroy(Product $product) {
        $product->delete();
        return response()->json()->setStatusCode(204);
    }
}
