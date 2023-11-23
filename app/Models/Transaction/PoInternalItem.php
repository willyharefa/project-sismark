<?php

namespace App\Models\Transaction;

use App\Models\Inventory\StockMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PoInternalItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'po_internal_items';

    public function po_internal(): BelongsTo
    {
        return $this->belongsTo(PoInternal::class);
    }

    public function stock_master(): HasOne
    {
        return $this->hasOne(StockMaster::class, 'id', 'stock_master_id');
    }
}
