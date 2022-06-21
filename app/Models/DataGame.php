<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGame extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table =  'data_game';

    protected $fillable = [
        'mdate',
        'stadium',
        'team1',
        'team2',
    ];
}
