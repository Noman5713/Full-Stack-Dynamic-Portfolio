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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->text('description');
            $table->string('github_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->json('images');
            $table->enum('type', ['personal', 'client', 'academic']);
            $table->string('reference')->nullable();
            $table->json('tools');
            $table->json('keywords')->nullable();
            $table->enum('status', ['active', 'inactive', 'in-progress']);
            $table->timestamps();
        });

        Schema::table('projects', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
