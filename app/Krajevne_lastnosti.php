<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krajevne_lastnosti extends Model
{
    protected $table = 'krajevne_lastnosti';

    protected $fillable = [
        'odsek', 'sifra_oznaka', 'kraj_nesrece', 'hisna_st', 'prizorisce', 'vzrok', 'tip',
    ];

    public function nesreca()
    {
        return $this->hasOne("App\Nesreca");
    }

    public function getSection()
    {
        return $this->odsek;
    }
}
