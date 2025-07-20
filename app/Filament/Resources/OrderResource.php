<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $slug = 'orders';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->latest();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tracking_id')
                    ->label('Tracking ID')->sortable()->searchable(),
                TextColumn::make('item_name')
                    ->label('Item Name')->sortable()->searchable(),
                TextColumn::make('receiver_name')
                    ->label('Receiver Name')->sortable(),
                TextColumn::make('sender_name')
                    ->label('Sender Name')->sortable()->searchable(),
                TextColumn::make('receiver_address')
            ])
            ->filters([
                //
            ])->headerActions([
                Action::make('New Order')->action(function () {
                    Order::create([]);
                })
            ])->actions([
                DeleteAction::make('delete')
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
//            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }


    public static function canCreate(): bool
    {
        return false;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
