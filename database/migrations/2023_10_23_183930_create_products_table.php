<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->text('information');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('price');
            $table->unsignedDouble('weight');
            $table->foreignIdFor(Category::class)->restrictOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function ($table) {
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('products');
    }
};
