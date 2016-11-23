<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $table = 'freelancers';
	protected $primaryKey = 'freelancer_id';

	protected $fillable = [
				'name', 
				'email',
				'phone',
				'phone_other',
				'place_of_birth',
				'date_of_birth',
				'gender',
				'last_education',
				'npwp',
				'bank',
				'bank_branch',
				'bank_account_number',
				'ktp_number',
				'ktp_city',
				'ktp_village_id',
				'ktp_address',
				'home_city',
				'home_village_id',
				'home_address'
	];

	protected $hidden = [
				'active', 'created_by', 'created_at', 'updated_by', 'updated_at'
	];

	public function historiesfreelancer() {
		return $this->hasMany('App\HistoryFreelancer', 'freelancer_id');
	}
}
