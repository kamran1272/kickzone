<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    protected $fillable = [
        'name', 'age', 'position', 'team_id', 'photo_url',
        'height', 'weight', 'nationality', 'jersey_number'
    ];

    // Relationship with team
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}