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
        Schema::create('sppb_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sppb_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('stock_master_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('qty');
            $table->foreignId('branch_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sppb_items');
    }
};
