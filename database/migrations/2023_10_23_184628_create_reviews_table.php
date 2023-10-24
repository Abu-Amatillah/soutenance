<?php

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
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id');
            $table->double('rating');
            $table->string('comment')->nullable();
            $table->foreignIdFor(User::class)->restrictOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(Product::class)->restrictOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function ($table) {
            $table->dropForeign(['user_id', 'product_id']);
        });
        Schema::dropIfExists('reviews');
    }
};
