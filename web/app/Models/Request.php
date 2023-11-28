<?php

namespace App\Models;

use App\Models\Users\Customer;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_title',
        'request_description',
        'vehicle_id',
        'request_location',
        'request_latitude',
        'request_longitude',
        'request_state',
        'customer_id'
    ];

    /**
     * Get the request state.
     */
    protected function requestState(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                switch ($value) {
                    case 'O':
                        return 'Open';
                    case 'C':
                        return 'Closed';
                    case 'E':
                        return 'Evaluating';
                    case 'A':
                        return 'Assigned';
                }
            },
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function multimedia(): HasMany
    {
        return $this->hasMany(MultimediaContent::class);
    }

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function acceptedResponse(): HasOne
    {
        return $this->hasOne(Response::class)->where('response_state', 'A');
    }
}
