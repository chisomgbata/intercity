<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected static bool $canCreateAnother = false;

    // redirect to the index page after creation
    protected function getRedirectUrl(): string
    {
        return OrderResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
