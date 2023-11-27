<?php

namespace App\Models\Users;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'ci'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function workshops(): HasMany
    {
        return $this->hasMany(Workshop::class);
    }
}
