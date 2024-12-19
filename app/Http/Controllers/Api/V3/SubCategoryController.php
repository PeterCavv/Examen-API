<?php

namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\Subcategory;

class SubCategoryController extends Controller
{
    public function index()
    {

        $subcategories = Subcategory::with('category')
            ->select('name', 'description', 'category_id')->paginate(10);

        return SubCategoryResource::collection($subcategories);
    }
}
