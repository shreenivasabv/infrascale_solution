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
        Schema::create('detailed_services', function (Blueprint $table) {

    $table->id();

    $table->string('title'); 
    $table->string('slug');

    $table->text('hero_description')->nullable();
    $table->longText('full_description')->nullable();
    $table->longText('overview')->nullable();

    $table->string('architecture_image')->nullable();

    $table->json('technologies')->nullable();
    $table->json('benefits')->nullable();
    $table->json('use_cases')->nullable();
    $table->json('faqs')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailed_services');
    }
};
