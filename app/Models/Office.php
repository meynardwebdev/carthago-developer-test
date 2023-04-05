<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Office extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'phone', 'address_line_1', 'address_line_2', 'state', 'postal_code', 'country', 'territory'];

    /**
     * Returns the list of employees that belongs/works for this Office
     *
     * @return HasMany
     */
    protected function Employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
