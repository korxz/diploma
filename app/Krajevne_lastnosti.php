<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nesreca;

class Krajevne_lastnosti extends Model
{
    protected $table = 'krajevne_lastnosti';
    private $earthR = 637100;

    protected $fillable = [
        'id_nesrece', 'odsek', 'sifra_oznaka', 'kraj_nesrece', 'hisna_st', 'prizorisce', 'vzrok', 'tip',
    ];

    public function nesreca()
    {
        return $this->hasOne("App\Nesreca");
    }

    public function getSection()
    {
        return $this->odsek;
    }

    public function near($x, $y)
    {
        $accident = Nesreca::where("id_nesrece", "=", $this->id_nesrece)->get();
        
        $latFrom = deg2rad((float) $x);
        $lonFrom = deg2rad((float) $y);

        $latTo = deg2rad($accident[0]->x);
        $lonTo = deg2rad($accident[0]->y);

        $latDelta = $latFrom - $latTo;
        $lonDelta = $lonFrom - $lonTo;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $this->earthR;
    }
}
