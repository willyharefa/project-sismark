<?php

namespace App\Models\Transaction;

use App\Models\Backend\Branch;
use App\Models\Inventory\StockMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SppbItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'sppb_items';

    public function sppb(): BelongsTo
    {
        return $this->belongsTo(Sppb::class);
    }

    public function stock_master(): HasOne
    {
        return $this->hasOne(StockMaster::class, 'id', 'stock_master_id');
    }

    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }
}
