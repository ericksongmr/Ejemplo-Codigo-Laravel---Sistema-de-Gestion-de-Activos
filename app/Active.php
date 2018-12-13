<?php

namespace SGLCJUJEDU;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class Active extends Model
{
    protected $table = "actives";

    protected $fillable = ['category_active_id', 'item_id', 'code', 'name', 'features', 'unit', 'stock', 'location_id', 'note', 'photo', 'state'];

    public function categoryActive()
    {
    	return $this->belongsTo('SGLCJUJEDU\Category_Active');
    }

    public function location()
    {
    	return $this->belongsTo('SGLCJUJEDU\Location');
    }

    public function item()
    {
        return $this->belongsTo('SGLCJUJEDU\Item');
    }

    public function historyActives()
    {
    	return $this->hasMany('SGLCJUJEDU\HistoryActive');
    }

    public function jobs()
    {
    	return $this->belongsToMany('SGLCJUJEDU\Job')->withTimestamps();
    }

    public function prices()
    {
        return $this->hasMany('SGLCJUJEDU\Price');
    }

    public function scopeSearchActive($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }

    public function scopeSearchCategoryAct($query, $categoryAct)
    {
        if ($categoryAct != '') {
            return $query->where('category_active_id', $categoryAct);
        }
    }

    public function scopeSearchLocation($query, $location)
    {
        if ($location != '') {
            return $query->where('location_id', $location);
        }
    }

    public function setPhotoAttribute($photo)
    {
        if (!empty($photo) && Request::file('photo')->isValid()) {
            $name = date('y-m-d-h-i-s') .'_photo.'. $photo->getClientOriginalExtension();
            $this->attributes['photo'] = $name;
            Storage::putFileAs('public/uploads/photos', Request::file('photo'), $name);
        }
    }
}
