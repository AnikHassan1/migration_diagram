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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('des',100);
            $table->string('email');
            $table->unsignedBigInteger('product_id');
//            relationship
            $table->foreign('product_id')->references('id')->on('products')
            ->restrictOnDelete()->cascadeOnUpdate();

            $table->foreign('email')->references('email')->on('users')
            ->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamp("created_at")->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
