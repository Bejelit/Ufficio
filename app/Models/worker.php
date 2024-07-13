<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class worker extends Model
{
    protected $primaryKey = 'matricola';
    public $timestamps = false;
    use HasFactory;
}
