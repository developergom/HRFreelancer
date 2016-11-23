<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';
	protected $primaryKey = 'division_id';

	protected $fillable = [
				'division_name', 'division_desc'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function departments() {
		return $this->hasMany('App\Department', 'division_id');
	}
}
