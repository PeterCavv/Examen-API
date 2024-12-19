<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subcategory extends Model
{
    /** @use HasFactory<\Database\Factories\SubcategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Relación entre Categorías y Subcategorías. Una Categoría puede tener
     * muchas subcategorías, pero estas solo pueden pertenecer a una.
     * @return BelongsTo
     */
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

}
