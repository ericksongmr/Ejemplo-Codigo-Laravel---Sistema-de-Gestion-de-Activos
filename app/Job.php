<?php

namespace SGLCJUJEDU;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "jobs";

    protected $fillable = ['description'];

    public function outputs()
    {
    	return $this->hasMany('SGLCJUJEDU\Output');
    }

    public function actives()
    {
    	return $this->belongsToMany('SGLCJUJEDU\Active')->withTimestamps();
    }
}
