<?php

namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(9);

        return ProductResource::collection($products);
    }

    /**
     * Función para guardar un producto.
     * @param StoreProductRequest $request
     * @return ProductResource
     */
    public function store(StoreProductRequest $request){
        $data = $request->all();

        $product = Product::create($data);

        return new ProductResource($product);
    }

    /**
     * Función para actualizar un producto.
     * @param Product $product
     * @param StoreProductRequest $request
     * @return ProductResource
     */
    public function update(Product $product, StoreProductRequest $request){
        $product->update($request->all());

        return new ProductResource($product);
    }

    /**
     * Función para eliminar un producto, devolviendo un JSON con
     * un mensaje y un código de respuesta.
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product){
        $product->delete();

        return response()->json("Producto eliminado con éxtio", 200);
    }

}
