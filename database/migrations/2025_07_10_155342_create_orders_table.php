<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id');
            $table->string('item_name');
            $table->integer('quantity');
            $table->string('recipient_name');
            $table->text('recipient_address');
            $table->text('recipient_details')->nullable();
            $table->text('info')->nullable();
            $table->json('delivery_steps')->nullable();
            $table->integer('current_step')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
