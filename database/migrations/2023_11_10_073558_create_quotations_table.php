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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('code_quo')->unique();
            $table->foreignId('activity_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('no_sp');
            $table->enum('type_expedition', ['Franco','Loco']);
            $table->string('type_payment');
            $table->enum('status_quo', ['draf','request', 'done']);
            $table->text('remark');
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
