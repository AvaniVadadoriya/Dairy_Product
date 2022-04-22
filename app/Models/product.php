<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $primaryKey='pid';
    protected $fillable=['pname','s_c_id','description','cid','brand_id','flav_id','pack_id','ingredients'];
    public $timestamps=false;
}
