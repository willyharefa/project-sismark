<?php

namespace App\Models\TaskManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progress extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $tables = 'progress';

    public function activities(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

}
