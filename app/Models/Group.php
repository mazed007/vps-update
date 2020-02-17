<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = ['name','restored_at','created_by','restored_by','slug'];
}
