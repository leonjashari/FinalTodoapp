<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assigned_user_id')->constrained('users', 'id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('group')->nullable(); // Allow NULL values
            $table->boolean('urgent')->nullable()->default(false);
            $table->timestamps();
            $table->string('status')->default('Todo');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Remove the foreign key column
            $table->dropForeign(['assigned_user_id']);
            $table->dropColumn('assigned_user_id');
        });
    }
};
