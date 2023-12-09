<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('update_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('assigned_subject');
            $table->string('aysem');
            $table->bigInteger('slot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_blocks');
    }
};
