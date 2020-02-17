<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = ['name','restored_at','created_by','restored_by','slug','group_id'];

    public function group()
    {
    	return $this->hasOne(\App\Models\Group::class, 'id', 'group_id');
    }
}
