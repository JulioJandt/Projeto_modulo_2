<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    // Defina a relação com o modelo Exercise
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }


}
