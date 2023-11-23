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
        Schema::create('po_internal_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('po_internal_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('stock_master_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('qty');
            $table->decimal('price', 15,2);
            $table->decimal('total_price', 15,2);
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_internal_items');
    }
};
