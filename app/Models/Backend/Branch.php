<?php

namespace App\Models\Backend;

use App\Models\Partner\Customer;
use App\Models\Transaction\InvoiceToSppb;
use App\Models\Transaction\Quotation;
use App\Models\Transaction\Sppb;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'branches';

    public function stocks(): BelongsTo
    {
        return $this->belongsTo(Stock::class, 'id', 'branch_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function sppb(): BelongsTo
    {
        return $this->belongsTo(Sppb::class);
    }

    public function invoice_to_sppb(): BelongsTo
    {
        return $this->belongsTo(InvoiceToSppb::class);
    }
}
