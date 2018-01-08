<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nesreca extends Model
{

    protected $table = 'nesreca';
    
    protected $fillable = [
        'klas_nesrece', 'st_ue', 'datum', 'ura', 'x', 'y',
    ];
}
