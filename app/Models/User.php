<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Trait\CurrencyHandler;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, SoftDeletes, CurrencyHandler;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'country_id',
        'type',
        'status',
        'wallet_bal',
        'referral',
        'ref_bal',
        'referred',
        'preferred_cur',
        'photo_url',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function currency_rate(): BelongsTo
    {
        return $this->belongsTo(CurrencyRate::class, 'preferred_cur');
    }

    public function getBalance()
    {
        $response = $this->processExchangeRate($this->wallet_bal, 'to_view', $this->id);
        return $response;
    }

    public function toView($amt)
    {
        $response = $this->processExchangeRate($amt, 'to_view', $this->id);
        return $response;
    }


}
