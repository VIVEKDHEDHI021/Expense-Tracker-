<?php

namespace App\Models;
use App\Models\User;
use App\Http\Controllers\CalControoler;

use Illuminate\Database\Eloquent\Model;


   class Expense extends Model{
    protected $fillable = [
        'user_id',
        'title',
        'amount',
        'category',
        'expense_date',
        'description'
    ];


    public function user()
    {
        // return $this->belongsTo(User::class);
    }
}
