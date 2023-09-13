<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acheter extends Model
{
    use HasFactory;
    protected $fillable = [
        "prix",
        "immobilier_id"
    ];
    public function immobiliers()
    {
        return $this->belongTo(Immobilier::class);
    }
}