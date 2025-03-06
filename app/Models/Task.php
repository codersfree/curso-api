<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use App\Models\Scopes\IncludeScope;
use App\Models\Scopes\SelectScope;
use App\Models\Scopes\SortScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


#[ScopedBy([
    FilterScope::class,
    SelectScope::class,
    SortScope::class,
    IncludeScope::class
])]
class Task extends Model
{
    use HasFactory;

    /* protected $fillable = [
        'body', 'user_id'
    ]; */

    protected $guarded = [
        'paid'
    ];

    public function scopeGetOrPaginate($query)
    {
        if (request()->has('perPage')) {
            return $query->paginate(request()->query('perPage'));
        }

        return $query->get();
        
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
