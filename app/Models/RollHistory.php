<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RollHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'roll',
        'result',
        'result_dices',
        'modifier'
    ];

    protected $casts = [
        'result_dices' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
