<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bet extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'game_id',
        'league_id',
        'category_id',
        'bet_amt',
        'first_team',
        'draw',
        'last_team',
        'status',
        'bet_status',
        'game_date',
        'bet_count'
    ];

    public function games(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
    
}
