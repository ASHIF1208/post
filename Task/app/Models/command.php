<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class command extends Model
{
    use HasFactory;
    protected $table = "commands";
    protected $fillable = ['command','user_id','post_id'];
}
