<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $slug = 'orders';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('tracking_id')->default(uniqid())->columnSpanFull(),
                TextInput::make('item_name')->label('Item Name')->required(),
                TextInput::make('quantity')->label('Quantity')->numeric()->required(),
                TextInput::make('recipient_name')->label('Recipient Name')->required(),
                Textarea::make('recipient_address')->label('Recipient Address')->required(),
                Textarea::make('recipient_details')->label('Recipient Details'),
                Section::make([
                    Repeater::make('delivery_steps')->columnSpanFull()
                        ->schema([
                            TextInput::make('step_name')->label('Step Description')->required(),
                        ])
                        ->columns()
                        ->defaultItems(1)
                        ->live()
                        ->minItems(1)
                        ->maxItems(5)->label('')->default([
                            ['step_name' => 'Initial processing of the order'],
                            ['step_name' => 'Packaging the item'],
                            ['step_name' => 'Shipping the item to the recipient'],
                            ['step_name' => 'Delivery confirmation'],
                            ['step_name' => 'Order completed']
                        ])
                ])->columnSpanFull()->collapsible()->collapsed()->label('Delivery Steps'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tracking_id')
                    ->label('Tracking ID')->sortable()->searchable(),
                TextColumn::make('item_name')
                    ->label('Item Name')->sortable()->searchable(),
                TextColumn::make('quantity')
                    ->label('Quantity')->sortable(),
                TextColumn::make('recipient_name')
                    ->label('Recipient Name')->sortable()->searchable(),
                TextColumn::make('recipient_address'),
                SelectColumn::make('current_step')->label('Current Step')
                    ->options(fn(Order $record): array => collect($record->delivery_steps)->mapWithKeys(function ($step, $index) {
                        return [$index + 1 => $step['step_name'] ?? $step];
                    })->toArray()),
                TextInputColumn::make('info')
                    ->label('Additional Info')->searchable()
                    ->placeholder('Any additional information about the order'),

            ])
            ->filters([
                //
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
