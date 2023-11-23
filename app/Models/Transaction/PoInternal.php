<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PoInternal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'po_internal';

    public function po_internal_item(): HasMany
    {
        return $this->hasMany(PoInternalItem::class, 'po_internal_id');
    }
    
}
