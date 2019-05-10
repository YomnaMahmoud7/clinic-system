<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Drug extends Model
{
    /**
     * The Attributes that are mass assignable
     * 
     * @var array
     */
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
		'name', 'description'
    ];

    /**
     * Get the Rochtas for the Advice
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function rochtas()
    {
    	return $this->belongsToMany('App\Model\Rochta','drug_rochta','drug_id','rochta_id');
    }

    /**
     * Get the Illnesses for the Drug
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function illnesses()
    {
        return $this->belongsToMany('App\Model\Illness');
    }
}
