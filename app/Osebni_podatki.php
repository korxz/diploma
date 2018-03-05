<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Osebni_podatki extends Model
{
    protected $table = 'osebni_podatki';

    protected $fillable = [
        'oseba_je', 'starost', 'spol', 'drzavljanstvo', 'poskodba_osebe', 'vrsta_udelezenca', 'varnost', 'izkusensot', 'alkotest', 'strokovi_pregled'
    ];
}
