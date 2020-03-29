<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomersField extends Model
{

    protected $fillable = ['customer_id', 'field_key', 'field_value'];

}
