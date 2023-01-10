<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Players;

class Boot extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
    ];

    public function players()
    {
        return $this->hasMany(Players::class);
    }
}
