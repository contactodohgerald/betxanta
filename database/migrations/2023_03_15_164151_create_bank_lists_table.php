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
        Schema::create('bank_lists', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('code');
            $table->string('longcode')->nullable();
            $table->string('country');
            $table->string('currency')->nullable();
            $table->string('type')->nullable();
            $table->boolean('status')->default(true);

            $table->softDeletes();  //add this line
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_lists');
    }
};
