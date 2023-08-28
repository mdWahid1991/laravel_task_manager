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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('user_comment')->nullable();
            $table->enum('status', ['Todo','Done','Delay','Emergency'])->default('Todo');
            $table->string('publisher_name');
            $table->integer('publisher_id');
            $table->string('assign_to_name');
            $table->integer('assign_to_id');
            $table->string('upload_file')->nullable();
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
