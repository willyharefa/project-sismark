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
        Schema::create('pricelists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_master_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('vendor_id');
            $table->decimal('pay_a', 10,2);
            $table->decimal('pay_b', 10,2);
            $table->decimal('pay_c', 10,2);
            $table->date('start_date');
            $table->date('end_date');
            $table->unique(['stock_master_id','city_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricelists');
    }
};
