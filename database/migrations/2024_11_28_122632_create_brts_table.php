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
        Schema::create('brts', function (Blueprint $table) {
            $table->id();
            $table->string('brt_code')->nullable()->unique();
            $table->decimal('reserved_amount', 10, 2)->nullable();
            $table->date('expiry_date')->nullable();
            $table->timestamps();

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brts');
    }
};
