<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobilier extends Model
{
    use HasFactory;
    protected $fillable = [
        "type",
        "surface",
        "localisation",
        "description",
        "imageA",
        "imageB",
        "imageC",
        "imageD",
        "imageE",
    ];
    public function users()
    {
        return $this->belongTo(User::class);
    }
    public function acheters()
    {
        return $this->hasMany(Acheter::class);
    }
    public function louers()
    {
        return $this->hasMany(Louer::class);
    }
}