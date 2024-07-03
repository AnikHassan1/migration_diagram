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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->unsignedBigInteger('product_id');
            $table->string('color',100);
            $table->string('size',100);

            $table->foreign('product_id')->references('id')->on('products')
                ->restrictOnDelete()->restrictOnDelete();
            $table->foreign('email')->references('email')->on('users')
                ->restrictOnDelete()->cascadeOnDelete();

            $table->timestamp("created_at")->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
