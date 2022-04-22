<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table='norder';
    protected $primaryKey='o_id';
    protected $fillable=['code','uid','amount','discount','o_name','o_email','o_phone','address','city','pincode','o_status','o_date','payment_id','d_b_id'];
    public $timestamps=false;
}
