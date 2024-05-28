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
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('batch');
            $table->string('image')->nullable();
            $table->integer('amount');
            $table->decimal('purchase', 8, 2);
            $table->decimal('sale', 8, 2);
            $table->string('expiration_date');
            $table->string('status');
            $table->string('registerby');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicaments');
    }
};
