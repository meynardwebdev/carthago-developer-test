<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'first_name', 'job_title', 'email', 'office_id', 'reports_to'];

    /**
     * Returns the immediate superior for this Employee
     *
     * @return BelongsTo
     */
    public function Superior(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'reports_to', 'id');
    }

    /**
     * Returns the office where this Employee works
     *
     * @return BelongsTo
     */
    public function Office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }
}
