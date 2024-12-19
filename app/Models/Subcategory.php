<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subcategory extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Relación entre Categorías y Subcategorías. Una Categoría puede tener
     * muchas subcategorías, pero estas solo pueden pertenecer a una.
     * @return BelongsTo
     */
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    /**
     * Relación entre subcategorías y productos. Un producto puede tener
     * muchas categorías y una subcategoría puede pertenecer a muchos productos.
     * @return BelongsToMany
     */
    public function product(): BelongsToMany {
        return $this->belongsToMany(Product::class);
    }
}
