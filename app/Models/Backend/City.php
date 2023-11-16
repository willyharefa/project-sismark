<?php

namespace App\Models\Backend;

use App\Models\Sales\Pricelist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function pricelist(): BelongsTo
    {
        return $this->belongsTo(Pricelist::class, 'city_id', 'id');
    }
}
