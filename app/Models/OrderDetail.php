<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'price', 'order_line_number', 'product_id', 'order_id'];

    /**
     * Returns the Order for this Order Details
     *
     * @return BelongsTo
     */
    public function Order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Returns the Product for this Order Detail
     *
     * @return BelongsTo
     */
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
