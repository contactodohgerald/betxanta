<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'league_id',
        'category_id',
        'country_id',
        'game_date',
        'team_a',
        'team_b',
        'location_a',
        'location_b',
        'status',
        'game_status',
        'min_amt',
        'escrow_fee',
        'score_payload',
        'who_won',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class, 'league_id');
    }

    public function frst_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_a');
    }

    public function second_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_b');
    }
    
}
