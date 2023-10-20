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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manager_id');
            $table->string('name_project');
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->string('status');
            $table->string('image')->nullable();
            $table->foreign('manager_id')->references('id')->on('manager');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
