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
        Schema::create('history_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('history_id');
            $table->foreign('history_id')->references('id')->on('histories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('locale')->index();// e.g. 'en', 'fr'
            $table->unique(['history_id', 'locale']);
            $table->string('title');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_translations');
    }
};
