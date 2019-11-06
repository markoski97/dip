<?php

namespace App;

use App\Filters\Laminat\LaminatFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Laminat extends Model
{
    public function scopeFilter(Builder $builder,$request,array $filters=[])
    {
        return (new LaminatFilters($request))->add($filters)->filter($builder);

    }
}
