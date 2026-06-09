<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkerTransaction extends Model
{
    protected $fillable=[
            'id',
            'worker_id',
            'user_id',
            'worker_name',
            'amount',  
            'transaction_date',
            'payment_type',
            'description'

    ];
}
