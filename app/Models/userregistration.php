<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userregistration extends Model
{
    use HasFactory;
    
    protected $table='userregistration';
    protected $fillable=['uname','phone','email','password','terms','u_type','dob','url','u_status'];
    public $timestamps=false;
}
