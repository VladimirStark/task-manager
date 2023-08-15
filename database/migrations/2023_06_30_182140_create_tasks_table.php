<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new      class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название задачи
            $table->string('preview'); // Краткий текст задачи
            $table->text('detail'); // Полный текст задачи
            $table->string('file'); // Вложение
            $table->boolean('priority')->default(false); // Высокий приоритет
            $table->foreignId('status_id')->references('id')->on('statuses');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
