<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reseller extends Model
{
    use SoftDeletes;

	protected $guarded = ['id'];
    protected $fillable = ['user_id','restored_at','created_by','restored_by','email'];


    public function user()
    {
    	return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }
}
