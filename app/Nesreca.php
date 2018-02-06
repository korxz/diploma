<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nesreca extends Model
{

    protected $table = 'nesreca';
    
    protected $fillable = [
        'id_nesrece', 'klas_nesrece', 'st_ue', 'datum', 'ura', 'x', 'y',
    ];
}
