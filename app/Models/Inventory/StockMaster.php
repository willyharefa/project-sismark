<?php

namespace App\Models\Inventory;

use App\Models\Backend\Branch;
use App\Models\Sales\Pricelist;
use App\Models\Transaction\PoInternalItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StockMaster extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'stock_masters';

    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }
    
    public function pricelist(): BelongsTo
    {
        return $this->belongsTo(Pricelist::class);
    }

    public function po_internal_item(): BelongsTo
    {
        return $this->belongsTo(PoInternalItem::class);
    }
}
