<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = []; //Lista de cosas que NO se pueden asignar con create, no especificar nada significa que todo es fillable

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
