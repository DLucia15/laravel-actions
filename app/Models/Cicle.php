<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cicle extends Model
{
    protected $table = 'cicles';
    
    public function student(){
        return $this->hasMany(Student::class);
    }
}
