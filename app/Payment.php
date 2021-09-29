<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=['id','User_id','Course_id','P_date','amount','payment_status','teacher_id'];
    public function user()
    {
        return $this->belongsTo('App\User','User_id','teacher_id');
    }
}
