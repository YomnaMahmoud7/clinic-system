<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rochta extends Model
{
    /**
     * The Attributes that are mass assignable
     * 
     * @var array
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'doctor_id', 'reservation_id'
    ];

    /**
     * Get the Doctor for the Rochta
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function doctor()
    {
        return $this->belongsTo('App\User', 'id', 'doctor_id')->where('type', '=', 'doctor');
    }
    public function patient()
    {
    	return $this->belongsTo('App\Model\Patient');
    }

    /**
     * Get the reservation for the rochta
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function reservation()
    {
    	return $this->belongsTo('App\Model\Reservation');
    }

    /**
     * Get the Advices for the Rochta
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function advices()
    {
        return $this->belongsToMany('App\Model\Advice','advice_rochta','advice_id','rochta_id');
    }

    /**
     * Get the Drugs for the Rochta
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function drugs()
    {
        return $this->belongsToMany('App\Model\Drug','drug_rochta','drug_id','rochta_id');
    }

 
}
