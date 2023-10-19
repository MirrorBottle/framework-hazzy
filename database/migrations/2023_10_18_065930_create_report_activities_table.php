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
        Schema::create('report_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id');
            $table->string('number')->unique();
            $table->text('hazard');
            $table->text('consequence');
            $table->text('risk_control');
            $table->enum('type', [
                'N', 'Ab', 'E'
            ]);
            $table->enum('initial_risk', [
                'L', 'S', 'R'
            ]);
            $table->enum('residual_risk', [
                'L', 'S', 'R'
            ]);
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('reports')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_activities');
    }
};
