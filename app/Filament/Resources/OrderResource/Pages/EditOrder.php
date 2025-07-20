<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class EditOrder extends Page
{
    use InteractsWithRecord;


    protected static string $resource = OrderResource::class;

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

    protected string $view = 'filament.resources.order-resource.pages.edit-order';

    public function updated(): void
    {
        $this->record->update([
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


    public function mount(int|string|null $record): void
    {
        $this->record = $this->resolveRecord($record);
        $this->tracking_id = $this->record->tracking_id;
        $this->sender_name = $this->record->sender_name ?? $this->sender_name;
        $this->sender_email = $this->record->sender_email ?? $this->sender_email;
        $this->sender_phone = $this->record->sender_phone ?? $this->sender_phone;
        $this->sender_address = $this->record->sender_address ?? $this->sender_address;
        $this->receiver_name = $this->record->receiver_name ?? $this->receiver_name;
        $this->receiver_email = $this->record->receiver_email ?? $this->receiver_email;
        $this->receiver_phone = $this->record->receiver_phone ?? $this->receiver_phone;
        $this->receiver_address = $this->record->receiver_address ?? $this->receiver_address;
        $this->country = $this->record->country ?? $this->country;
        $this->origin = $this->record->origin ?? $this->origin;
        $this->destination = $this->record->destination ?? $this->destination;
        $this->item_weight = $this->record->item_weight ?? $this->item_weight;
        $this->item_name = $this->record->item_name ?? $this->item_name;
        $this->item_total_cost = $this->record->item_total_cost ?? $this->item_total_cost;

    }
}
