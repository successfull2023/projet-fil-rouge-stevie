<?php

namespace App\Models;
use App\Models\categories;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{

    use HasFactory;
    protected $guarded = [

        'Categorie_id',
        'libelle',
    ];


}
