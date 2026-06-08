<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Worker extends Model
{


     protected $fillable = [
        'user_id',
        'worker_name',
        'mobile',
        'address',
        'notes'
    ];
}
