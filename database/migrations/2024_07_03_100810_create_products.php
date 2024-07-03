<?php

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
            $table->id();

            $table->string('title',50);
            $table->string('short_des',50);
            $table->string('price',50);

            $table->boolean('discount');
            $table->string('discount_price', 50);
            $table->string('image', 50);
            $table->boolean('stock');
            $table->float('star');
            $table->enum('remark',['latest','top','special','others','old']);

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
                  $table->unsignedBigInteger('cat_id');
            // Relationship Start

            $table->foreign('category_id')->references('id')
            ->on('categories')->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('brand_id')->references('id')
            ->on('brands')->restrictOnDelete()->cascadeOnUpdate();

            // Relationship End



            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
