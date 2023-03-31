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
        Schema::create('bets', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('game_id');
            $table->uuid('league_id');
            $table->uuid('category_id');
            $table->decimal('bet_amt', 13, 4)->nullable();

            $table->uuid('first_team')->nullable();
            $table->uuid('draw')->nullable();
            $table->uuid('last_team')->nullable();
            
            $table->boolean('status')->default(true);
            $table->string('bet_status');
            $table->dateTime('game_date');
            $table->integer('bet_count')->default(1);

            $table->softDeletes();  //add this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bets');
    }
};
