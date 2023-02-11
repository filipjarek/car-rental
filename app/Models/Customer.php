<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [

        'fullname',
        'date_of_birth',
        'gender',
        'idcard',
        'phone',
        'address',
        'zip_code',

    ];
}
