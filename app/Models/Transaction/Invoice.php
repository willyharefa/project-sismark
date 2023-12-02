<?php

namespace App\Models\Transaction;

use App\Models\Partner\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'invoices';

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function invoice_to_sppb(): HasMany
    {
        return $this->hasMany(InvoiceToSppb::class, 'id', 'invoice_id');
    }
}
