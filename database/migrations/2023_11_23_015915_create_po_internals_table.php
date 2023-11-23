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
        Schema::create('po_internals', function (Blueprint $table) {
            $table->id();
            $table->string('code_po_in')->unique();
            $table->string('customer_id');
            $table->string('created_by')->nullable();
            $table->enum('status_po_in', ['draf', 'request', 'approved', 'close', 'reject'])->default('draf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_internals');
    }
};
