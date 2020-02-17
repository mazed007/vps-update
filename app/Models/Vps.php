<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vps extends Model
{
    use SoftDeletes;

	protected $guarded = ['id'];
    protected $fillable = ['user_id','period','expired_date','restored_at','created_by','restored_by','added_date','server_ip','server_name',
        'operating_system','vpn_type','vpn_connection','port'];

    public function getPeriodAttribute($value)
    {
        $periods = vps_periods();

    	if ($value && array_key_exists($value, $periods)) {
            return $periods[$value];
        }
    }

    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function createdBy()
    {
    	return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function restoredBy()
    {
    	return $this->belongsTo(\App\Models\User::class, 'restored_by');
    }

    public function getOperatingSystemAttribute($value)
    {
        $os = operating_systems();

        if ($value && array_key_exists($value, $os)) {
            return $os[$value];
        }
    }

    public function getVpnTypeAttribute($value)
    {
        $types = vpn_types();

        if ($value && array_key_exists($value, $types)) {
            return $types[$value];
        }
    }

    /*public function setExpiredDateAttribute()
    {
        // $months = 
        $this->attributes['expired_date'] = \Carbon\Carbon::now()->addMonths($this->period);
    }

    public function setAddedDateAttribute()
    {
        $this->attributes['added_date'] = \Carbon\Carbon::now();
    }*/
}
