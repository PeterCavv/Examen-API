<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    /**
     * Relación entre subcategorías y productos. Un producto puede tener
     * muchas categorías y una subcategoría puede pertenecer a muchos productos.
     * @return HasMany
     */
    public function subCategory(): HasMany{
        return $this->hasMany(Subcategory::class);
    }
}
