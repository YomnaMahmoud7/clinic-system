<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    /**
     * The Attributes that are mass assignable
     * 
     * @var array
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'name', 'email', 'age', 'job', 'mobile', 'telephone', 'gender', 'address'
    ];
    public function rochtas()
    {
        return $this->hasMany('App\Model\Rochta');
    }
}
