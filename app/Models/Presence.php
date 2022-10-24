<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Roles;

class Presence extends Model
{
    use HasFactory;
    protected $table ='presences';
    protected $fillable =[
        'id',
        'Options',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
   public function role(){
    return $this->belongsTo(Role::class);
   }
    
}
