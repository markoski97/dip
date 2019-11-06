<?php

namespace App\Filters\Laminat;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class SistemnagreejneFilter extends FilterAbstract
{

    public function mappings()
    {
        return [
            'Подржува' => 'Подржува',
            'Неподржува' => 'Неподржува',
        ];
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value === null) {
            return $builder;
        }
        return $builder->where('sistemnagreejne',$value);
    }


}