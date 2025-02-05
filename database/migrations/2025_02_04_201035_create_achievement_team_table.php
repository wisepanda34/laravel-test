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
        Schema::create('achievement_team', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('achievement_id');

            // Создание внешних ключей
            $table->foreign('team_id', 'team_achievement_team_fk')
                ->on('teams')
                ->references('id')
                ->onDelete('cascade')  // Пример использования onDelete
                ->onUpdate('cascade'); // Пример использования onUpdate

            $table->foreign('achievement_id', 'team_achievement_achievement_fk')
                ->on('achievements')
                ->references('id')
                ->onDelete('cascade')  // Пример использования onDelete
                ->onUpdate('cascade'); // Пример использования onUpdate

            // Индексы для улучшения производительности запросов
            $table->index('team_id', 'team_achievement_team_idx');
            $table->index('achievement_id', 'team_achievement_achievement_idx');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievement_team');
    }
};
