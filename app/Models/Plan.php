<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    // Define the relationship with users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Define an accessor to get the limit for each plan
    public function getLimitAttribute()
    {
        // Adjust this logic based on your actual database structure
        // This assumes there is a 'limit' column in your plans table
        return $this->attributes['limit'];
    }
}
