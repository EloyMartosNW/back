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
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies', 'id')->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->string('requirements');
            $table->string('salary');
            $table->string('schedule');
            $table->string('contract_type');
            $table->date('expiration_date');
            $table->string('selection_process');
            $table->string('organizational_culture');
            $table->string('benefits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
