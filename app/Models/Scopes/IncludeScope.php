<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class IncludeScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        //Incluir relaciones
        if (empty(request('include'))) {
            return;
        }

        $include = explode(',', request('include'));
        $builder->with($include);
    }
}
