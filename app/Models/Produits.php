<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $fillable =[
        'designation',
        'prix',
        'quantite',
    ];

    function categories(){
        return $this->belongsTo(categories::class, 'categories_id');
       }
}
