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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('code_inv')->unique();
            $table->foreignId('customer_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('date_top');
            $table->string('no_po_cust');
            $table->string('created_by');
            $table->string('address_delivery');
            $table->decimal('ppn', 15,2)->default(0 );
            $table->decimal('total_inv', 15,2)->default(0);
            $table->foreignId('sales_user_id')->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->enum('status_inv', ['draf', 'request', 'approved', 'reject'])->default('draf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
