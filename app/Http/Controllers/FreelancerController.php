<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

use Gate;
use BrowserDetect;
use App\Http\Requests;
use App\Department;
use App\Division;
use App\Freelancer;
use App\HistoryFreelancer;
use App\Position;
use App\User;

use App\Ibrol\Libraries\NotificationLibrary;
use App\Ibrol\Libraries\UserLibrary;

class FreelancerController extends Controller
{
    private $notif;

    public function __construct() {
        $this->notif = new NotificationLibrary;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('Freelancers Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        return view('vendor.material.freelancer.list', $data);
    }

    public function create()
    {
    	if(Gate::denies('Freelancers Management-Create')) {
            abort(403, 'Unauthorized action.');
        }

        $f = new Freelancer;
        $hf = new HistoryFreelancer;

        $data = array();
        $data['last_educations'] = $f->last_educations;
        $data['divisions'] = Division::where('active', '1')->orderBy('division_name')->get();
        $data['positions'] = Position::where('active', '1')->orderBy('position_name')->get();
        $data['honor_types'] = $hf->honor_types;

        return view('vendor.material.freelancer.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:14',
            'other_phone' => 'max:14',
            'place_of_birth' => 'required|max:100',
            'date_of_birth' => 'required|date_format:"d/m/Y"',
            'gender' => 'required',
            'last_education' => 'required',
            'ktp_number' => 'required',
            'npwp' => 'required',
            'ktp_address' => 'required',
            'ktp_city' => 'required',
            'home_address' => 'required',
            'home_city' => 'required',
            'bank' => 'required',
            'bank_account_name' => 'required',
            'bank_account_number' => 'required',
        ]);

        $obj = new Freelancer;

        $obj->name = $request->input('name');
        $obj->email = $request->input('email');
        $obj->phone = $request->input('phone');
        $obj->phone_other = $request->input('other_phone');
        $obj->place_of_birth = $request->input('place_of_birth');
        $obj->date_of_birth = Carbon::createFromFormat('d/m/Y', $request->input('date_of_birth'))->toDateString();
        $obj->gender = $request->input('gender');
        $obj->last_education = $request->input('last_education');
        $obj->ktp_number = $request->input('ktp_number');
        $obj->npwp = $request->input('npwp');
        $obj->ktp_address = $request->input('ktp_address');
        $obj->ktp_city = $request->input('ktp_city');
        $obj->home_address = $request->input('home_address');
        $obj->home_city = $request->input('home_city');
        $obj->bank = $request->input('bank');
        $obj->bank_branch = $request->input('bank_branch');
        $obj->bank_account_name = $request->input('bank_account_name');
        $obj->bank_account_number = $request->input('bank_account_number');
        $obj->active = '1';
        $obj->created_by = $request->user()->user_id;

        $obj->save();

        //store history
        if($request->session()->has('histories_' . $request->user()->user_id)) {
    		$histories = $request->session()->get('histories_' . $request->user()->user_id);
    		foreach($histories as $history) {
    			$his = new HistoryFreelancer;
    			$his->freelancer_id = $obj->freelancer_id;
    			$his->department_id = $history['department_id'];
    			$his->position_id = $history['position_id'];
    			$his->start_date = Carbon::createFromFormat('d/m/Y', $history['start_date'])->toDateString();
    			$his->end_date = Carbon::createFromFormat('d/m/Y', $history['end_date'])->toDateString();
    			$his->honor_type = $history['honor_type'];
    			$his->honor = $history['honor'];
    			$his->active = '1';
    			$his->created_by = $request->user()->user_id;

    			$his->save();
    		}

    		$request->session()->forget('histories_' . $request->user()->user_id);
    	}

        $request->session()->flash('status', 'Data has been saved!');

        return redirect('freelancer');
    }

    public function show(Request $request, $id)
    {
        if(Gate::denies('Freelancers Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $u = new UserLibrary;
        $subordinate = $u->getSubOrdinateArrayID($request->user()->user_id);

        //dd($subordinate);

        $data = array();
        $data['freelancer'] = Freelancer::with(
        									'historiesfreelancer', 
        									'historiesfreelancer.department', 
        									'historiesfreelancer.department.division', 
        									'historiesfreelancer.position'
        								)->where('active','1')->find($id);

        if(count($subordinate) > 0) {
        	if(in_array($data['freelancer']->created_by, $subordinate) || $data['freelancer']->created_by==$request->user()->user_id) {
	        	return view('vendor.material.freelancer.show', $data);
	        }else{
	        	abort(403, 'Unauthorized action.');	
	        }
        }else{
        	if($data['freelancer']->created_by==$request->user()->user_id) {
        		return view('vendor.material.freelancer.show', $data);
        	}else{
        		abort(403, 'Unauthorized action.');			
        	}
        }

    }

    public function apiDelete(Request $request)
    {
        if(Gate::denies('Freelancers Management-Delete')) {
            abort(403, 'Unauthorized action.');
        }

        $id = $request->input('freelancer_id');

        $obj = Freelancer::find($id);

        $obj->active = '0';
        $obj->updated_by = $request->user()->user_id;

        if($obj->save())
        {
            return response()->json(100); //success
        }else{
            return response()->json(200); //failed
        }
    }

    public function apiList(Request $request)
    {
    	$u = new UserLibrary;
        $subordinate = $u->getSubOrdinateArrayID($request->user()->user_id);

        $current = $request->input('current') or 1;
        $rowCount = $request->input('rowCount') or 5;
        $skip = ($current==1) ? 0 : (($current - 1) * $rowCount);
        $searchPhrase = $request->input('searchPhrase') or '';
        
        $sort_column = 'freelancer_id';
        $sort_type = 'asc';

        if(is_array($request->input('sort'))) {
            foreach($request->input('sort') as $key => $value)
            {
                $sort_column = $key;
                $sort_type = $value;
            }
        }

        $data = array();
        $data['current'] = intval($current);
        $data['rowCount'] = $rowCount;
        $data['searchPhrase'] = $searchPhrase;
        $data['rows'] = Freelancer::where('freelancers.active','1')
        					->join('users','users.user_id', '=', 'freelancers.created_by')
        					/*->where(function($query) use($request, $subordinate){
                                $query->where('freelancers.created_by', '=' , $request->user()->user_id)
                                        ->orWhereIn('freelancers.created_by', $subordinate);
                            })*/
                            ->where(function($query) use($searchPhrase) {
                                $query->orWhere('name','like','%' . $searchPhrase . '%')
                                        ->orWhere('email','like','%' . $searchPhrase . '%')
                                        ->orWhere('phone','like','%' . $searchPhrase . '%')
                                        ->orWhere('last_education','like','%' . $searchPhrase . '%')
                                        ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                            })
                            ->skip($skip)->take($rowCount)
                            ->orderBy($sort_column, $sort_type)->get();
        $data['total'] = Freelancer::where('freelancers.active','1')
        					->join('users','users.user_id', '=', 'freelancers.created_by')
                            /*->where(function($query) use($request, $subordinate){
                                $query->where('freelancers.created_by', '=' , $request->user()->user_id)
                                        ->orWhereIn('freelancers.created_by', $subordinate);
                            })*/
                            ->where(function($query) use($searchPhrase) {
                                $query->orWhere('name','like','%' . $searchPhrase . '%')
                                        ->orWhere('email','like','%' . $searchPhrase . '%')
                                        ->orWhere('phone','like','%' . $searchPhrase . '%')
                                        ->orWhere('last_education','like','%' . $searchPhrase . '%')
                                        ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                            })->count();

        return response()->json($data);
    }

    public function apiLoadHistory(Request $request) {
    	if(Gate::denies('Freelancers Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

    	$data = array();

    	$data['histories'] = $request->session()->get('histories_' . $request->user()->user_id);

    	return response()->json($data);
    }

    public function apiStoreHistory(Request $request) {
    	if(Gate::denies('Freelancers Management-Create')) {
            abort(403, 'Unauthorized action.');
        }

    	$data = array();

    	$division_id = $request->input('division_id');
    	$division_name = $request->input('division_name');
    	$department_id = $request->input('department_id');
    	$department_name = $request->input('department_name');
    	$position_id = $request->input('position_id');
    	$position_name = $request->input('position_name');
    	$start_date = $request->input('start_date');
    	$end_date = $request->input('end_date');
    	$honor_type = $request->input('honor_type');
    	$honor = $request->input('honor');

    	$history = array();
    	$history['division_id'] = $division_id;
    	$history['division_name'] = $division_name;
    	$history['department_id'] = $department_id;
    	$history['department_name'] = $department_name;
    	$history['position_id'] = $position_id;
    	$history['position_name'] = $position_name;
    	$history['start_date'] = $start_date;
    	$history['end_date'] = $end_date;
    	$history['honor_type'] = $honor_type;
    	$history['honor'] = $honor;

    	$histories = array();
    	if($request->session()->has('histories_' . $request->user()->user_id)) {
    		$histories = $request->session()->get('histories_' . $request->user()->user_id);
    		$request->session()->forget('histories_' . $request->user()->user_id);
    	}

    	$histories[] = $history;

    	$request->session()->put('histories_' . $request->user()->user_id, $histories);
    	
    	$data['status'] = '200';

    	return response()->json($data);
    }

    public function apiDeleteHistory(Request $request) {
    	$data = array();

    	$key = $request->input('key');

    	$histories = array();
    	if($request->session()->has('histories_' . $request->user()->user_id)) {
    		$histories = $request->session()->get('histories_' . $request->user()->user_id);
    		$request->session()->forget('histories_' . $request->user()->user_id);

    		unset($histories[$key]);

    		$request->session()->put('histories_' . $request->user()->user_id, $histories);
    	
	    	$data['status'] = '200';

	    	return response()->json($data);	
    	}else{
    		$data['status'] = '500';

	    	return response()->json($data);
    	}


    }
}
