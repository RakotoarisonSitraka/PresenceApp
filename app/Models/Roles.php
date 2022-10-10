<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Employee;

class Roles extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'Type_roles',

    ];
    public function employee(){
        return $this->hasMany(Employee::class,'id','Type_roles');
    }

}
