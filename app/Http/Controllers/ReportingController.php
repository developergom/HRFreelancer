<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Gate;

use App\Department;
use App\Division;
use App\Freelancer;
use App\HistoryFreelancer;
use App\Position;
use App\User;

use Carbon\Carbon;

class ReportingController extends Controller
{
    public function index() {
    	$data = array();

    	$f = new Freelancer;
    	$hf = new HistoryFreelancer;

    	$data['departments'] = Department::with('division')->where('active', '1')->orderBy('department_name')->get();
    	$data['positions'] = Position::where('active', '1')->orderBy('position_name')->get();
    	$data['genders'] = ['Male', 'Female'];
    	$data['educations'] = $f->last_educations;
    	$data['honor_types'] = $hf->honor_types;

    	return view('vendor.material.report.index', $data);
    }

    public function apiGenerateReport(Request $request) {
    	$department_ids = $request->input('department_ids');
    	$position_ids = $request->input('position_ids');
    	$gender_ids = $request->input('gender_ids');
    	$education_ids = $request->input('education_ids');
    	$honor_type_ids = $request->input('honor_type_ids');
    	$year_ids = $request->input('year_ids');
    	$month_ids = $request->input('month_ids');

    	//dd(implode(', ', array_map(null, $department_ids)));

    	$q = "SELECT 
				freelancers.freelancer_id,
			    freelancers.name,
			    freelancers.email,
			    freelancers.phone,
			    freelancers.phone_other,
			    freelancers.place_of_birth,
			    freelancers.date_of_birth,
			    freelancers.gender,
			    freelancers.last_education,
			    freelancers.npwp,
			    freelancers.bank,
			    freelancers.bank_account_name,
			    freelancers.bank_account_number,
			    freelancers.bank_branch,
			    freelancers.ktp_number,
			    freelancers.ktp_city,
			    freelancers.ktp_address,
			    freelancers.home_city,
			    freelancers.home_address,
			    divisions.division_name,
			    departments.department_name,
			    positions.position_name,
			    history_freelancers.start_date,
			    history_freelancers.end_date,
				history_freelancers.honor_type,
			    history_freelancers.honor
			FROM 
				freelancers
			INNER JOIN history_freelancers ON history_freelancers.freelancer_id = freelancers.freelancer_id
			INNER JOIN hrfreelancer.positions ON positions.position_id = history_freelancers.position_id
			INNER JOIN hrfreelancer.departments ON departments.department_id= history_freelancers.department_id
			INNER JOIN hrfreelancer.divisions ON divisions.division_id= departments.division_id
			WHERE
				freelancers.active = '1'";

		if($department_ids != "") {
    		$q .= " AND history_freelancers.department_id IN ('" . implode(', ', array_map(null, $department_ids)) . "')";
    	}

    	if($position_ids != "") {
    		$q .= " AND history_freelancers.position_id IN ('" . implode(', ', array_map(null, $position_ids)) . "')";
    	}

    	if($gender_ids != "") {
    		$q .= " AND freelancers.gender IN ('" . implode(', ', array_map(null, $gender_ids)) . "')";
    	}

    	if($education_ids != "") {
    		$q .= " AND freelancers.last_education IN ('" . implode(', ', array_map(null, $education_ids)) . "')";
    	}

    	if($honor_type_ids != "") {
    		$q .= " AND history_freelancers.honor_type IN ('" . implode(', ', array_map(null, $honor_type_ids)) . "')";
    	}

    	if($year_ids != "") {
    		$q .= " AND year(history_freelancers.start_date) IN ('" . implode(', ', array_map(null, $year_ids)) . "')";
    	}

    	if($month_ids != "") {
    		$q .= " AND month(history_freelancers.start_date) IN ('" . implode(', ', array_map(null, $month_ids)) . "')";
    	}

    	$q .= ' ORDER BY name ASC';

    	//dd($q);

    	$result = DB::select($q);

    	$data = array();

    	$data['result'] = $result;

    	return response()->json($data);
    }
}
