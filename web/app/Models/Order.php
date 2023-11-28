<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_date',
        'subtotal',
        'tax',
        'total',
        'request_id',
        'customer_id',
        'workshop_id'
    ];

    public function details(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
    
}
