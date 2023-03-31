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
        Schema::create('bet_histories', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('bet_id');
            $table->uuid('game_id');
            $table->uuid('user_id');
            $table->decimal('amt_won', 13, 4)->nullable();
            $table->string('bet_status');
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
        Schema::dropIfExists('bet_histories');
    }
};
