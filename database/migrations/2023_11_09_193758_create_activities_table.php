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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('code_activity')->unique();
            $table->string('name_customer');
            $table->string('type_bussiness');
            $table->string('name_pic_customer');
            $table->string('position_pic');
            $table->string('location');
            $table->string('type_customer');
            $table->enum('type_action', ['mapping', 'introduction', 'penetration', 'jartest', 'quotation', 'deals', 'supply & maintenance'])->nullable();
            $table->enum('status_work', ['on-going', 'done'])->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('branch_id')->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
