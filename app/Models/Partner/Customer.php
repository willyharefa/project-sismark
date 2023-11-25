<?php

namespace App\Models\Partner;

use App\Models\Account\SalesUser;
use App\Models\Backend\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'customers';

    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }
    
    public function sales_user(): BelongsTo
    {
        return $this->belongsTo(SalesUser::class);
    }
}
