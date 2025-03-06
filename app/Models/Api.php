<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use App\Models\Scopes\IncludeScope;
use App\Models\Scopes\SelectScope;
use App\Models\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected static function booted(): void
    {
        static::addGlobalScopes([
            FilterScope::class,
            SelectScope::class,
            SortScope::class,
            IncludeScope::class
        ]);
    }

    public function scopeGetOrPaginate($query)
    {
        if (request()->has('perPage')) {
            return $query->paginate(request()->query('perPage'));
        }

        return $query->get();
        
    }
}
