<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductLine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Returns the Products list that belongs to this Product Line
     *
     * @return HasMany
     */
    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
