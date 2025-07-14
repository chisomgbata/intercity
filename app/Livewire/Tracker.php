<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class Tracker extends Component
{
    public string $trackingId = '';
    public bool $modalOpen = false;
    public Order $order;

    public function trackOrder()
    {
        $this->validate([
            'trackingId' => 'required|exists:orders,tracking_id',
        ]);

        $this->order = Order::where('tracking_id', $this->trackingId)->first();
    }

    public function render()
    {
        return view('livewire.tracker');
    }
}
