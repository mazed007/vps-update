<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pin extends Model
{
    use SoftDeletes;

	protected $guarded = ['id'];
    protected $fillable = ['user_id','period','restored_at','created_by','restored_by'];

    public function user()
    {
    	return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }
}
