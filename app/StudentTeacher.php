<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTeacher extends Model
{
    protected $fillable=['id','user_id','teacher_id'];

}
