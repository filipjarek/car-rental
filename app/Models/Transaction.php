<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function invoices(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    protected $casts = [

        'transaction_date' => 'datetime:Y-m-d',
        'rent_date' => 'datetime:Y-m-d',
        'return_date' => 'datetime:Y-m-d',
        'return_day' => 'datetime:Y-m-d',

    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function isSelectedEmployee(int $employee_id): bool
    {
        return $this->hasEmployee() && $this->employee->id == $employee_id;
    }

    public function hasEmployee(): bool
    {
        return !is_null($this->employee);
    }
}
