<?php

namespace SGLCJUJEDU;

use Illuminate\Database\Eloquent\Model;

class HistoryActive extends Model
{
    protected $table = "history_actives";

    protected $fillable = ['type', 'active_id', 'amount', 'responsible', 'date', 'note'];

    public function active()
    {
    	return $this->belongsTo('SGLCJUJEDU\Active');
    }

    public function scopeSearchType($query, $type)
    {
        if ($type != '') {
            return $query->where('type', $type);
        }
    }

    public function scopeSearchDate($query, $date)
    {
        if ($date != '') {
            return $query->where('date', $date);
        }
    }

}
