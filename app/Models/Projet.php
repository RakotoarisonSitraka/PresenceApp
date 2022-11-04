<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domaine;

class Projet extends Model
{
    use HasFactory;
    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }
}
