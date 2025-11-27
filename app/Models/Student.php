<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'birth_date',
        'phone_number',
        'user_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function cicle(){
        return $this->belongsTo(Cicle::class);
    }
}
