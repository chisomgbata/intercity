<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STEPS = [
        'Moved to dispatch location',
        'Cleared to leave source country',
        'In transit',
        'Arrived at destination country',
        'Cleared at destination country',
        'Handed over to local delivery partner',
        'Delivered'
    ];


    protected $fillable = [
        'date_shipped', 'arrival_date',
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

        static::retrieved(function (Order $order) {
            $order->recalculateProgress();
        });

    }

    public function recalculateProgress(): void
    {
        $totalSteps = count(self::STEPS);
        $now = now();
        $dispatchDate = $this->date_shipped;
        $arrivalDate = $this->arrival_date;

        if (!$dispatchDate || !$arrivalDate) {
            return;
        }

        $totalHours = $dispatchDate->diffInHours($arrivalDate);

        if ($now < $dispatchDate) {
            $currentStep = 0;
        } elseif ($now >= $arrivalDate) {
            $currentStep = $totalSteps;
        } else {

            $elapsedHours = $dispatchDate->diffInHours($now);
            $progress = $elapsedHours / $totalHours;
            $currentStep = min($totalSteps, max(1, ceil($progress * $totalSteps)));
        }

        if ($currentStep > $this->progress && $currentStep > 5) {
            $this->progress = $currentStep;
            $this->save();
        }

    }


    protected function casts(): array
    {
        return [
            'date_shipped' => 'date',
            'arrival_date' => 'date',
        ];
    }
}
