<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    use HasFactory;
    protected $table='attribute';
    protected $primaryKey='attr_id';
    protected $fillable=['pid','size_id','qty','price','mfg_date','expire_date'];
    public $timestamps=false;

}
