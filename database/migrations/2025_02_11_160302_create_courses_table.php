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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('dummy_download_links');
            $table->text('download_names');
            $table->text('download_links');
            $table->text('downcodes')->nullable();
            $table->text('img')->nullable();
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->timestamp('update_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
