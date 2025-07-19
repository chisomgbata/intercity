<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class EditOrder extends Page
{
    use InteractsWithRecord;


    protected static string $resource = OrderResource::class;


    public string $trackingId = "";
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

    public function mount(int|string $record): void
    {
        $this->trackingId = uniqid();
        $this->record = $this->resolveRecord($record);
    }
}
