<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
	protected $primaryKey = 'department_id';

	protected $fillable = [
				'department_name', 'department_desc'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function division() {
		return $this->belongsTo('App\Division', 'division_id');
	}

	public function historiesfreelancer() {
		return $this->hasMany('App\HistoryFreelancer', 'department_id');
	}
}
