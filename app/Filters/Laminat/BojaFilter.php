<?php

namespace App\Filters\Laminat;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class BojaFilter extends FilterAbstract
{

    public function mappings()
    {
        return [
            'Светла' => 'Светла',
            'Средна' => 'Средна',
            'Темна' => 'Темна',
        ];
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value === null) {
            return $builder;
        }
        return $builder->where('boja',$value);
    }


}