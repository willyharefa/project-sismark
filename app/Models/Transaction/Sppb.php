<?php

namespace App\Models\Transaction;

use App\Models\Backend\Branch;
use App\Models\Partner\Customer;
use App\Models\Transaction\SppbItem;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction\InvoiceToSppb;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sppb extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'sppbs';

    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }
    
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function sppb_item(): HasMany
    {
        return $this->hasMany(SppbItem::class, 'sppb_id');
    }

    public function invoice_to_sppb(): BelongsTo
    {
        return $this->belongsTo(InvoiceToSppb::class);
    }
}
