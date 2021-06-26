<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    use HasFactory;
    protected $table = 'prestadores';
    public $timestamps = false;

    public function programa(){
        return $this->belongsToMany(Programa::class);
    }
}
