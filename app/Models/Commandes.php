<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;
    protected $guarded = [
        'date',
        'montant',
        'statut',
        'mode_paiement',
        'produit_commande',
        'adresse',

    ];

    function clients(){
        return $this->belongsTo(clients::class, 'clients_id');
       }
}
