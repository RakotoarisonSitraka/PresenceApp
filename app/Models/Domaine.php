<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\Employee;
use App\Models\Role;
class Domaine extends Model
{
    use HasFactory;

    public function Role(){
        return $this->hasOne(Role::class);
    }
    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function Projets(){
        return $this->hasMany(Projet::class);
    }
}
