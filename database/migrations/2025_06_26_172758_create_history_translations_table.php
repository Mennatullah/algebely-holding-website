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
            $table->string('locale');    // e.g. 'en', 'ar'
            $table->srting('title'); 
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
