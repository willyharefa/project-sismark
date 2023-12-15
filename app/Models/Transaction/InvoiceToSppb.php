<?php

namespace App\Models\Transaction;

use App\Models\Backend\Branch;
use App\Models\Transaction\Sppb;
use App\Models\Transaction\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceToSppb extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'invoice_to_sppbs';

    public function sppb(): HasMany
    {
        return $this->hasMany(Sppb::class, 'id', 'sppb_id');
    }
    
    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
