<?php

namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Models\Subcategory;
use http\Env\Request;

class SubCategoryController extends Controller
{
    public function index()
    {

        $subcategories = Subcategory::with('category')
            ->select('name', 'description', 'category_id')->paginate(10);

        return SubCategoryResource::collection($subcategories);
    }

    /**
     * Función que guarda una nueva subcategoría.
     * @param StoreSubCategoryRequest $request
     * @return SubCategoryResource
     */
    public function store(StoreSubCategoryRequest $request) {

        $data = $request->all();

        $subCategory = Subcategory::create($data);

        return new SubCategoryResource($subCategory);

    }

    /**
     * Función para actualizar la información de una subcategoría.
     * @param Subcategory $subCategory
     * @param StoreSubCategoryRequest $request
     * @return SubCategoryResource
     */
    public function update(Subcategory $subCategory, StoreSubCategoryRequest $request)
    {
        $subCategory->update($request->all());

        return new SubCategoryResource($subCategory);
    }

    /**
     * Elimina una subcategoría, enviando un json con un mensaje
     * y un código de respuesta HTTP.
     * @param Subcategory $subCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Subcategory $subCategory){
        $subCategory->delete();

        return response()->json("Creado con éxito", 200);
    }

}
