<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();

            $table->string('img1',100);
            $table->string('img2',100);
            $table->string('img3',100);
            $table->string('img4',100);
            $table->longText('description',200);
            $table->string('color',100);
            $table->string('size',100);

            $table->unsignedBigInteger('product_id')->unique();

            //Relationship
            $table->foreign('product_id')->references('id')->on('products')
            ->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
           ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
