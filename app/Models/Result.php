<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_name',
        'date',
        'winner',
        'details',
    ];

    protected $dates = ['date'];

    public function fixture()
    {
        return $this->belongsTo(Fixture::class);
    }
}