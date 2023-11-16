<?php

namespace App\Models\TaskManagement;

use App\Models\Backend\Branch;
use App\Models\Transaction\Quotation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activity extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $tables = 'activities';

    public function progress(): HasMany
    {
        return $this->hasMany(Progress::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }
}
