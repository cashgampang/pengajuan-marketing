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
        Schema::create('foto_surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_survey_id')->constrained('hasil_survey_pengajuans')->onDelete('cascade');
            $table->string('foto_survey')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_surveys');
    }
};
