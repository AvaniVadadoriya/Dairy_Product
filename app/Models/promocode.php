<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promocode extends Model
{
    use HasFactory;
    protected $table="promocode";
    protected $fillable=['code','uid','promo_type','amount','s_date','e_date','min_order','no_use','promo_status'];
    public $timestamps=false;
}
