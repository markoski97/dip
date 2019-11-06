<?php

namespace App\Filters\Laminat;

use App\Filters\FiltersAbstract;
use App\Filters\FilterAbstract;



use App\Filters\Laminat\SistemnagreejneFilter;
use App\Filters\Laminat\KlasanaotpornostFilter;
use App\Filters\Laminat\BojaFilter;
use App\Filters\Laminat\DebelinaFilter;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Laminat;


class LaminatFilters extends FiltersAbstract
{
    protected $filters = [
       'debelina'=>DebelinaFilter::class,
        'boja'=>BojaFilter::class,
        'klasanaotpornost'=>KlasanaotpornostFilter::class,
        'sistemnagreejne'=>SistemnagreejneFilter::class,

    ];
}
