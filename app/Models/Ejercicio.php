<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Marca;
use App\Models\Image;
class Ejercicio extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'musculo',
    ];

    public function Marca()
    {
        return $this->hasMany(Marca::class);
    }
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}