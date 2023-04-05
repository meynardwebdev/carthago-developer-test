<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['sku', 'name', 'description', 'vendor', 'quantity_in_stock', 'price', 'msrp', 'product_line_id'];

    /**
     * Returns the Product Line for this Product
     *
     * @return BelongsTo
     */
    public function ProductLine(): BelongsTo
    {
        return $this->belongsTo(ProductLine::class, 'product_line_id', 'id');
    }
}
