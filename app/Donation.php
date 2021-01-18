<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['name', 'phonenumber', 'amount', 'note'];

    protected $table = 'donations';
}
