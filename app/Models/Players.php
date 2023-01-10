<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Boot;

class Players extends Model
{
    use HasFactory;

    /**
    * @var array<int, string>
    */
    protected $fillable = [
        'name',
        'boots_id',
    ];

    public function boots() {
        return $this->belongsTo(Boot::class);
    }
}
