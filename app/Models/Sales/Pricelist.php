<?php

namespace App\Models\Sales;

use App\Models\Backend\City;
use App\Models\Inventory\StockMaster;
use App\Models\Transaction\QuotationItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pricelist extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $tables = ['pricelists'];
    protected $casts = [
        'start_date'=> 'date',
        'end_date' => 'date',
    ];

    public function stock_master(): HasOne
    {
        return $this->hasOne(StockMaster::class, 'id', 'stock_master_id');
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function quotation_item(): BelongsTo
    {
        return $this->belongsTo(QuotationItem::class, 'quotation_item_id');
    }
}
