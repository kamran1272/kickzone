<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'details',
        'status',
        'date',
        'time',
        'file',
        'notify',
        'email',
        'sms',
        'push',
        'webhook',
    ];

    protected $casts = [
        'notify' => 'boolean',
        'email' => 'boolean',
        'sms' => 'boolean',
        'push' => 'boolean',
        'webhook' => 'boolean',
        'date' => 'date',
        'time' => 'datetime:H:i',
        'status' => 'string',
    ];
}