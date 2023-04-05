<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['date_ordered', 'date_shipped', 'status', 'comments', 'customer_id'];

    /**
     * Returns the Customer for this Order
     *
     * @return BelongsTo
     */
    public function Customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    /**
     * Returns the Order Details that belongs to this Order
     *
     * @return HasMany
     */
    public function OrderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
