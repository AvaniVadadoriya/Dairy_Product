<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    use HasFactory;
    protected $table='orderdetail';
    protected $primaryKey='o_d_id';
    protected $fillable=['o_id','pid','o_qty','o_price','o_size_id'];
    public $timestamps=false;
}
