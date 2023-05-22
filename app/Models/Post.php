<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id', 'theme_type_id', 'url_id', 'status_id','mode_id', 'type', 'location', 'hot'];
}
