<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesreps extends Model
{
    protected $table = "salesrep";

    protected $fillable = [
        'name', 'commission', 'tax', 'bonus'
    ];
}
