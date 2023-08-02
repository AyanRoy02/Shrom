<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class JobPost extends Model
{
    use HasFactory;
    protected $table= 'jobposts';
    protected $guarded = [];
}
