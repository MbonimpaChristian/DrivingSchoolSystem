<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $fillable=['id','question','choiceA','choiceB','choiceC','choiceD','answer'];
}
