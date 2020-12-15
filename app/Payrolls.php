<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payrolls extends Model
{
    protected $table = "payroll";

    protected $fillable = [
        'salesrep_id', 'month', 'period', 'year', 'bonuses', 'numberofclients'
    ];

}
