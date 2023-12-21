<?php

namespace App\Models\UserManagement;

use App\Models\Partner\Customer;
use App\Models\Transaction\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SalesUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'sales_users';

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function customer(): HasMany
    {
        return $this->hasMany(Customer::class, 'id', 'sales_user_id');
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'id', 'sales_user_id');
    }
}
