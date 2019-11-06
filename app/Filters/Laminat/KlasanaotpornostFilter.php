<?php

namespace App\Filters\Laminat;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class KlasanaotpornostFilter extends FilterAbstract
{

    public function mappings()
    {
        return [
            'AC3' => 'AC3',
            'AC4' => 'AC4',
            'AC5' => 'AC5',
        ];
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value === null) {
            return $builder;
        }
        return $builder->where('klasanaotpornost',$value);
    }


}