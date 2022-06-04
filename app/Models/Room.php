<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Room extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'player1',
        'previous_turn',
        'start_time',
        'turn',
        'end_time',
        'before',
        'status',
        'board'
    ];
    protected $table = 'room';
    public $timestamps = false;
}
