<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flavour extends Model
{
    use HasFactory;
    protected $table='flavour';
    protected $primaryKey='flav_id';
    protected $fillable=['flav_name'];
    public $timestamps=false;
}
