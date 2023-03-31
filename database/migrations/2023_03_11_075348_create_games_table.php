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
        Schema::create('games', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('league_id');
            $table->uuid('category_id');
            $table->uuid('country_id');
            $table->dateTime('game_date');
            $table->uuid('team_a');
            $table->uuid('team_b');
            $table->string('location_a');
            $table->string('location_b');
            $table->boolean('status')->default(true);
            $table->string('game_status');
            $table->decimal('min_amt', 13, 4);
            $table->integer('escrow_fee');
            $table->json('score_payload')->nullable();
            $table->string('who_won')->nullable();

            $table->softDeletes();  //add this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
