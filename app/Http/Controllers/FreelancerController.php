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

        $data = array();

        return view('vendor.material.freelancer.create', $data);
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
        					->where(function($query) use($request, $subordinate){
                                $query->where('freelancers.created_by', '=' , $request->user()->user_id)
                                        ->orWhereIn('freelancers.created_by', $subordinate);
                            })
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
                            ->where(function($query) use($request, $subordinate){
                                $query->where('freelancers.created_by', '=' , $request->user()->user_id)
                                        ->orWhereIn('freelancers.created_by', $subordinate);
                            })
                            ->where(function($query) use($searchPhrase) {
                                $query->orWhere('name','like','%' . $searchPhrase . '%')
                                        ->orWhere('email','like','%' . $searchPhrase . '%')
                                        ->orWhere('phone','like','%' . $searchPhrase . '%')
                                        ->orWhere('last_education','like','%' . $searchPhrase . '%')
                                        ->orWhere('user_firstname','like','%' . $searchPhrase . '%');
                            })->count();

        return response()->json($data);
    }
}
