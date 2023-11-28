<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'response_description',
        'aprox_solution_time',
        'aprox_arrival_time',
        'pre_quote_amount',
        'response_state',
        'request_id',
        'workshop_id'
    ];

    protected function responseState(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                switch ($value) {
                    case 'W':
                        return 'Waiting';
                    case 'A':
                        return 'Accepted';
                    case 'I':
                        return 'In comming';
                    case 'C':
                        return 'Completed';
                }
            },
        );
    }

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }

    public function workshop(): BelongsTo
    {
        return $this->belongsTo(Workshop::class);
    }
}
