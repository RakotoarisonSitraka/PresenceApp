<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roles;

class Employee extends Model
{
    use HasFactory;
    protected $table ='employees';
    protected $fillable =[
        'Nom',
        'Prenom',
        'Email',
        'Telephone',
        'Profil',

    ];
   public function presences(){
          $this->hasMany(Presence::class);
   }
   public function role(){
    return $this->belongsTo(Role::class);
   }
}
