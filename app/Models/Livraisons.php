<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraisons extends Model
{
    protected $fillable = [
        'date_livraison',
        'statut',
        'adresse',
        'frais_livraison',
        'transporteur',
        'delais_livraison',

    ];

    function clients(){
        return $this->belongsTo(commandes::class, 'commandes_id');
       }
}


