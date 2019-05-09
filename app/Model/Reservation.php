<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    /**
     * The Attributes that are mass assignable
     * 
     * @var array
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'patient_id'
    ];

    /**
     * Get the Patient for the Reservation
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function patient()
    {
    	return $this->hasOne('App\Model\Patient', 'id', 'patient_id');
    }

    /**
     * Get the Rochtas for the Reservation
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function rochtas()
    {
        return $this->hasMany('App\Model\Rochta');
    }
}
