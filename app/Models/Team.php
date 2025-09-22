<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;

   protected $fillable = [
        'name', 'logo_url', 'founded_year', 'home_ground', 
        'ranking', 'wins', 'losses', 'win_rate', 'description', 'coach_id'
    ];
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function fixtures()
    {
        return $this->hasMany(Fixture::class);
    }
    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function coach(): BelongsTo
    {
        return $this->belongsTo(User::class, 'coach_id');
    }
}