<?php

namespace App\Models\Transaction;

use App\Models\Sales\Pricelist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuotationItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'quotation_items';
    
    public function quotation(): HasOne
    {
        return $this->hasOne(Quotation::class, 'quotation_id');
    }

    public function pricelist(): HasOne
    {
        return $this->hasOne(Pricelist::class, 'pricelist_id');
    }
}
