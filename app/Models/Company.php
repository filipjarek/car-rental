<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [

        'name',
        'NIP',
        'phone',
        'street',
        'zip_code',
        'city',
        'bank_number',

    ];

    public function invoices(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
