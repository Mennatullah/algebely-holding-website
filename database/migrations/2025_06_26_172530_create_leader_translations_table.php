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
        Schema::create('leader_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('leader_id');
            $table->foreign('leader_id')->references('id')->on('leaders')->onUpdate('cascade')->onDelete('cascade');
            $table->string('locale')->index();// e.g. 'en', 'fr'
            $table->unique(['leader_id', 'locale']);    // e.g. 'en', 'ar'
            $table->string('name');
            $table->string('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leader_translations');
    }
};
