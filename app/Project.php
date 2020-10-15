<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title','description','due_date','assign_project_to','is_complete','is_change'];

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = date('Y-m-d', strtotime($value));
    }
    public function getDueDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
    public function user()
    {
    	return $this->belongsTo('App\User','assign_project_to');
    }
}
