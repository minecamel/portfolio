<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();                              // タスクID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID
            $table->string('title');                    // タスク名
            $table->timestamp('registered_at');        // 登録日
            $table->timestamp('due_date')->nullable(); // 締切日（任意）
            $table->text('memo')->nullable();          // メモ（任意）
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
