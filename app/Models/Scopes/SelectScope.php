<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SelectScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        //Aplicar selects
        if (empty(request('select'))) {
            return;
        }

        $select = request('select');
        $selectArray = explode(',', $select);
        $builder->select($selectArray);
    }
}
