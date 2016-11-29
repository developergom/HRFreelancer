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
}
