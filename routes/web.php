<?php

use App\Livewire\Orders;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/orders', Orders::class)->name('orders');
