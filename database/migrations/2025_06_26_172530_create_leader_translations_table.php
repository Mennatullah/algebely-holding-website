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
            $table->string('locale');    // e.g. 'en', 'ar'
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
