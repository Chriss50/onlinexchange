<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function user() {
        return $this -> belongsTo('App\Models\User');
    }

    public function currency() {
        return $this -> hasMany('App\Models\Currency');
    }

    protected $fillable = ['value', 'comment', 'currency_id', 'sender_id', 'receiver_id'];
}
