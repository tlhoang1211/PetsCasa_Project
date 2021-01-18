<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['OrderType', 'FullName', 'PhoneNumber', 'Email', 'Message', 'PetId', 'IDNo', 'Status'];

}
