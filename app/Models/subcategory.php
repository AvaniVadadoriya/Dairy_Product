<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    protected $table='subcategories';
    protected $primaryKey='s_c_id';
    protected $fillable=['cid','scname'];
    public $timestamps=false;
}
