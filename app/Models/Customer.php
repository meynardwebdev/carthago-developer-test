<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'first_name', 'phone', 'address_line_1', 'address_line_2', 'city', 'state', 'postal_code', 'credit_limit', 'sales_representative_id'];

    /**
     * Returns the Sales Representative (Employee) or null for this Customer
     *
     * @return BelongsTo
     */
    public function salesRepresentative(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'sales_representative_id', 'id');
    }

    /**
     * Returns the full name of this Customer
     *
     * @return string
     */
    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Returns the complete address for this Customer
     *
     * @return string
     */
    public function fullAddress(): string
    {
        return $this->address_line_1 . ', ' . $this->address_line_2 ?? '' . ',  ' . $this->city . ', ' . $this->state . ' ' . $this->postal_code;
    }
}
