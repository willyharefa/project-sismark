<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Account\SalesUser;
use App\Models\Backend\Title;
use App\Models\TaskManagement\Activity;
use App\Models\TaskManagement\Progress;
use App\Models\Transaction\Quotation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }

    public function title(): HasOne
    {
        return $this->hasOne(Title::class, 'id', 'title_id');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'id', 'activity_id');
    }

    public function quotation(): HasMany
    {
        return $this->hasMany(Quotation::class, 'id', 'user_id');
    }

    public function progress(): hasOne
    {
        return $this->hasOne(Progress::class);
    }

    public function sales_user(): BelongsTo
    {
        return $this->belongsTo(SalesUser::class, 'user_id');
    }
}
