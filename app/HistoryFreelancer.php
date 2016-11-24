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

	public $honor_types = [
				'daily', 'monthly', 'by project', 'by creation'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function freelancer() {
		return $this->belongsTo('App\Freelancer', 'freelancer_id');
	}

	public function department() {
		return $this->belongsTo('App\Department', 'department_id');
	}

	public function position() {
		return $this->belongsTo('App\Position', 'position_id');
	}
}
