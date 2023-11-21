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
    // protected $tables = 'quotation_items';
    
    public function quotation(): HasOne
    {
        return $this->hasOne(Quotation::class, 'id', 'quotation_id');
        // duluan 'id' baru 'quotation_id' dikarenakan [CASE 1] dikarenakan set hasOne nya dimodel Utama,
    }

    public function pricelist(): HasOne
    {
        return $this->hasOne(Pricelist::class, 'id', 'pricelist_id');
    }
}
