<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['Title','Content','Pet_id','Account_id','Status','Slug'];
}
