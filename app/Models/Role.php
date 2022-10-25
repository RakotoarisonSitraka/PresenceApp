<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function presence() {
        return $this->hasMany(Presence::class);
    }
    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function Domaine(){
        return $this->hasOne(Domaine::class);
    }
}
