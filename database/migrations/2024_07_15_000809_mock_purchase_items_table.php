<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mock_purchase_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mock_purchase_id');
            $table->unsignedBigInteger('product_id'); // Define the foreign key column
            $table->unsignedBigInteger('product_variation_id'); // Define the foreign key column
            $table->integer('quantity');
            $table->decimal('price', 8, 2)->default(0);
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('mock_purchase_id')->references('id')->on('mock_purchases')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('product_variation_id')->references('id')->on('product_variations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mock_purchase_items');
    }
};
