<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pimage extends Model
{
    use HasFactory;
    protected $table='image';
    protected $primaryKey='i_id';
    protected $fillable=['url','pid'];
    public $timestamps=false;
}
