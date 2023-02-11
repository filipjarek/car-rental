<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [

        'number_invoice',
        'transaction_id',
        'company_id',
        'invoice_date',
        'buyer',
        'NIP',
        'address',
        'payment_method',
        'service',
        'VAT',

    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function isSelectedTransaction(int $transaction_id): bool
    {
        return $this->hasTransaction() && $this->transaction->id == $transaction_id;
    }

    public function hasTransaction(): bool
    {
        return !is_null($this->transaction);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function isSelectedCompany(int $company_id): bool
    {
        return $this->hasCompany() && $this->company->id == $company_id;
    }

    public function hasCompany(): bool
    {
        return !is_null($this->company);
    }
}
