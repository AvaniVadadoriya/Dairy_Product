<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
    use HasFactory;
    protected $table='contactus';
    protected $primaryKey='contact_id';
    public $timestamps=false;
    protected $fillable=['contact_name','contact_email','message'];
}
