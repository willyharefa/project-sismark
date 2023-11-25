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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('type_business');
            $table->string('address');
            $table->string('city'); 
            $table->string('country');
            $table->string('email')->nullable();
            $table->string('pic');
            $table->string('pic_title');
            $table->string('pic_phone');
            $table->string('phone_business');
            $table->string('npwp');
            $table->string('ppn')->default('non-ppn');
            $table->string('type_currency');
            $table->date('bod')->nullable();
            $table->foreignId('sales_user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
