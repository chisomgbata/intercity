<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_id',
        'item_name', 'quantity', 'recipient_name', 'recipient_address', 'recipient_details', 'delivery_steps', 'current_step',
        'info'
    ];

    // create a created observer to set the tracking_id if not provided and also set the current_step to 1
    protected $casts = [
        'delivery_steps' => 'array',
        'cancelled_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->tracking_id)) {
                $order->tracking_id = uniqid();
            }
            $order->current_step = 1;
        });
    }
}
