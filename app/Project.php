<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function getRouteKeyName() {
        return 'url';
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
