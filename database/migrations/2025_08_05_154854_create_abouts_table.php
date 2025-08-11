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
        Schema::create('abouts', function (Blueprint $table) {
               $table->id();
        $table->string('name');
        $table->string('designation');
        $table->text('brief');
        $table->string('image')->nullable();
        $table->unsignedTinyInteger('web_design_percent');
        $table->unsignedTinyInteger('development_percent');
        $table->unsignedTinyInteger('branding_percent');
        $table->string('facebook_url')->nullable();
        $table->string('linkedin_url')->nullable();
        $table->string('github_url')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
