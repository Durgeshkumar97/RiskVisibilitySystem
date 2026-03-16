<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientIntake extends Model
{
    protected $fillable = [
        'submission_uuid',
        'name',
        'email',
        'phone',
        'portfolio_value',
        'objective',
        'horizon',
        'archetype',
        'concern',
        'notes',
        'lead_score',
        'ai_status'
    ];
}

