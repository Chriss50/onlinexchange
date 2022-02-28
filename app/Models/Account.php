<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user() {
        $this -> belongsTo('App\Models\User');
    }

    public function currency() {
        $this -> belongsTo('App\Models\Currency');
    }

}
