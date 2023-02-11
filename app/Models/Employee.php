<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [

        'fullname',
        'email',
        'gender',
        'phone',
        'address',
        'zip_code',
        'employment_date',
        'dismissal_date',

    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
