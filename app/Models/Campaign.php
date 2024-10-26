<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'goal_amount',
        'owner',
        'deadline',
    ];

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }
}
