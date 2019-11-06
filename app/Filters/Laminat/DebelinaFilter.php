<?php

namespace App\Filters\Laminat;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class DebelinaFilter extends FilterAbstract
{

    public function mappings()
    {
        return [
            '8' => '8',
            '10' => '10',
            '12' => '12',
        ];
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value === null) {
            return $builder;
        }
        return $builder->where('debelina',$value);
    }


}