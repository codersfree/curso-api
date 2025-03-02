<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /* protected $fillable = [
        'body', 'user_id'
    ]; */

    protected $guarded = [
        'paid'
    ];
}
