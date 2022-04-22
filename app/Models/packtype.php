<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packtype extends Model
{
    use HasFactory;
    protected $table='packtype';
    protected $primaryKey='pack_id';
    protected $fillable=['pack_name'];
    public $timestamps=false;
}
