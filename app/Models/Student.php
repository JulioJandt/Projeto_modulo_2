<?php

namespace App\Models;

use Faker\Provider\ar_EG\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'date_birth', 'cpf', 'contact', 'user_id', 'city', 'neighborhood', 'number', 'street', 'state', 'cep'];

    protected $hidden = ['created_at','updated_at'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function address()
{
    return $this->hasOne(Address::class);
}

}
