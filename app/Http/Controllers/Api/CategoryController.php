<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Получение данных о всех категория
    public function index() {
        $categories = Category::all();
        return response()->json($categories)->setStatusCode(200);
    }

    // Получение данных о конкретной категории (для ресурсного маршрута)

    public function show(Category $category) {
        return response()->json($category)->setStatusCode(200);
    }

/*
     public function show($id) {
        $category = Category::find($id);
        if (isset($category)) {
            return response()->json($category)->setStatusCode(200);
        } else {
            throw new ApiException('Not Found', 404);
        }
     }
*/

    // Создание новой категории
    public function store(CategoryRequest $request) {
        $category = Category::create($request->validated());
        return response()->json($category)->setStatusCode(201);
    }

    // Обновление категории (для ресурсного маршрута)

    public function update(CategoryRequest $request, Category $category) {
        $category->update($request->validated());
        return response()->json($category)->setStatusCode(200);
    }

    /*
    public function update(CategoryRequest $request, $id) {
        $category = Category::find($id);
        if (isset($category)) {
            $category->update($request->validated());
            return response()->json($category)->setStatusCode(200);
        } else {
            throw new ApiException('Not Found', 404);
        }
    }
    */

    // Удаление категории (для ресурсного маршрута)

    public function destroy(Category $category) {
        $category->delete();
        return response()->json()->setStatusCode(204);
    }

    /*
    public function destroy($id) {
        $category = Category::find($id);
        if (isset($category)) {
            $category->delete();
            return response()->json()->setStatusCode(204);
        } else {
            throw new ApiException('Not Found', 404);
        }
    }
    */

}
