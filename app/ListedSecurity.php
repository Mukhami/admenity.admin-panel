<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListedSecurity extends Model
{
    protected $fillable = ['category','number_listed', 'mkt_cpt_ngn', 'mkt_cpt_usd'];

}
