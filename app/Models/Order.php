<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_id', 'sender_name', 'sender_email', 'sender_phone', 'sender_address', 'receiver_name', 'receiver_email', 'receiver_phone', 'receiver_address', 'country', 'origin', 'destination', 'item_weight', 'item_name', 'item_total_cost'
    ];


    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->tracking_id)) {
                $order->tracking_id = uniqid();
            }
        });
    }
}
