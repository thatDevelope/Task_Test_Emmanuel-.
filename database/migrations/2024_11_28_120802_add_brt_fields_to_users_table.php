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
        Schema::table('users', function (Blueprint $table) {
            $table->string('brt_code')->nullable()->unique(); // Unique identifier
            $table->decimal('reserved_amount', 15, 2)->nullable()->default(0); // Amount of Blume Coin reserved
            $table->enum('status', ['active', 'expired'])->nullable()->default('active'); // Status


            $table->foreign('brt_code')
              ->references('brt_code')
              ->on('brts')
              ->nullOnDelete(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
