<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subheadline extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'subheadline', 'location'];
}
