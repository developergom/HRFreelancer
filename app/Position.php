<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
	protected $primaryKey = 'position_id';

	protected $fillable = [
				'position_name', 'position_desc'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function historiesfreelancer() {
		return $this->hasMany('App\HistoryFreelancer', 'position_id');
	}
}
