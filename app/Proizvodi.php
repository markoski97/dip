<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proizvodi extends Model
{
    protected $table='proizvodis';
    //protected $appends=['link'];
    const KATEGORIJA_PDF=1;
    const KATEGORIJA_Laminat=2;
    const KATEGORIJA_Ostanato=3;
    public function pdfs()
    {
        return $this->hasOne('App\Pdf');
    }
    public function  link(){
        switch ($this->id)
        {
            case self::KATEGORIJA_PDF:
                return route('pdf.show',$this->id);

            case self::KATEGORIJA_Laminat:
                return route('laminat.index');

            case self::KATEGORIJA_Ostanato:
                return route('ostanato.index');
        }
        return '';
    }
}
