<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignIdFor(User::class)->restrictOnUpdate()->restrictOnDelete();
            $table->unsignedBigInteger('amount');
            $table->enum('status', ['pending', 'processed', 'aborted'])->default('pending');
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignIdFor(Order::class)->restrictOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(Product::class)->restrictOnUpdate()->restrictOnDelete();
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function ($table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('order_items', function ($table) {
            $table->dropForeign(['order_id', 'product_id']);
        });
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
    }
};
