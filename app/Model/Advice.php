<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advice extends Model
{
    /**
     * The Attributes that are mass assignable
     * 
     * @var array
     */
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'advice'
    ];

    /**
     * Get the Rochtas for the Advice
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function rochtas()
    {
    	return $this->belongsToMany('App\Model\Rochta','advice_rochta','advice_id','rochta_id');
    }
}
