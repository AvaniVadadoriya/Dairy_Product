<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliveryboy extends Model
{
    use HasFactory;
    protected $table='deliveryboy';
    protected $primaryKey='d_b_id';
    protected $fillable=['d_b_name','d_b_email'];
    public $timestamps=false;
}
