<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryFreelancer extends Model
{
    protected $table = 'history_freelancers';
	protected $primaryKey = 'history_freelancer_id';

	protected $fillable = [
				'freelancer_id',
				'department_id',
				'position_id',
				'honor',
				'honor_type',
				'start_date',
				'end_date'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function freelancer() {
		$this->belongsTo('App\Freelancer', 'freelancer_id');
	}

	public function department() {
		$this->belongsTo('App\Department', 'department_id');
	}

	public function position() {
		$this->belongsTo('App\Position', 'position_id');
	}
}
