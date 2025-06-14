<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function oeuvres()
    {
        return $this->hasMany(Oeuvre::class);
    }
}
