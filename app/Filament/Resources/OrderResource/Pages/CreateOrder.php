<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected static bool $canCreateAnother = false;
    public string $tracking_id = "";
    public string $sender_name = "John Doe";
    public string $sender_email = "john@example.com";
    public string $sender_phone = "1234567890";
    public string $sender_address = "123 Main St, City, State, ZIP";
    public string $receiver_name = "Jane Smith";
    public string $receiver_email = "jane@example.com";
    public string $receiver_phone = "9876543210";
    public string $receiver_address = "456 Elm St, City, State, ZIP";
    public string $country = "United States";
    public string $origin = "United States";
    public string $destination = "Canada";
    public string $item_weight = "10KG";
    public string $item_name = "PACKAGE";
    public string $item_total_cost = "100.00";

    public Order $order;
    protected string $view = 'filament.resources.order-resource.pages.edit-order';


    public function mount(): void
    {
        $this->tracking_id = uniqid();
        $this->order = new Order();
    }

    public function updated(): void
    {
        $this->order->updateOrCreate([
            'tracking_id' => $this->tracking_id,
            'sender_name' => $this->sender_name,
            'sender_email' => $this->sender_email,
            'sender_phone' => $this->sender_phone,
            'sender_address' => $this->sender_address,
            'receiver_name' => $this->receiver_name,
            'receiver_email' => $this->receiver_email,
            'receiver_phone' => $this->receiver_phone,
            'receiver_address' => $this->receiver_address,
            'country' => $this->country,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'item_weight' => $this->item_weight,
            'item_name' => $this->item_name,
            'item_total_cost' => $this->item_total_cost,
        ]);

    }

    protected function getRedirectUrl(): string
    {
        return OrderResource::getUrl('index');
    }
}
