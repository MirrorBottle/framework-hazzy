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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('team_id');
            $table->string('number')->unique();
            $table->string('activity');
            $table->dateTime('assesment_at');
            $table->text('note')->nullable();

            $table->enum('status', [
                1, 2, 3, 4, 5
            ])->default(1)->comment('1 = Blm Eval, 2 = Draft Eval, 3 = Diterima, 4 = Ditolak, 5 = Duplikat');
            $table->unsignedBigInteger('evaluation_id')->nullable();
            $table->text('evaluation_result')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('team_id')->references('id')->on('teams')->cascadeOnDelete();
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->cascadeOnDelete();

            $table->index(['company_id', 'team_id', 'evaluation_id', 'number']);
            $table->index('company_id');
            $table->index('team_id');
            $table->index('evaluation_id');
            $table->index('number');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
