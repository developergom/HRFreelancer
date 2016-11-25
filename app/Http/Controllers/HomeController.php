<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;

use App\User;
use App\Freelancer;

use App\Announcement;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user()->roles);
        $data = array();
        $today = date('Y-m-d');

        $data['announcements'] = Announcement::where(function($query) use($today) {
                                                    $query->where('announcement_startdate', '>=', $today)
                                                            ->where('announcement_enddate', '<=', $today);
                                                })->orWhere(function($query) use($today) {
                                                    $query->where('announcement_startdate', '<=', $today)
                                                            ->where('announcement_enddate', '>=', $today);
                                                })->where('active', '=', '1')->get();                                                        
        
        //total freelancer
        $totalfreelancer = Freelancer::where('active', '1')->count();

        //total freelancer by last_education
        $totalperlasteducation = DB::select("SELECT last_education, count(freelancer_id) AS total FROM freelancers WHERE active = '1' GROUP BY last_education");

        //freelancer yang masih bekerja sampai hari ini
        $activefreelancer = DB::select("SELECT 
                                    count(freelancers.freelancer_id) AS 'total'
                                FROM hrfreelancer.history_freelancers 
                                INNER JOIN hrfreelancer.freelancers 
                                ON freelancers.freelancer_id = history_freelancers.freelancer_id
                                WHERE
                                    freelancers.active = '1' AND
                                    history_freelancers.end_date >= '" . $today . "'");

        //freelancer yang masih bekerja sampai hari ini per department
        $activefreelancerperdepartment = DB::select("SELECT 
                                                        department_name,
                                                        COUNT(freelancers.freelancer_id) AS total
                                                    FROM history_freelancers 
                                                    INNER JOIN freelancers 
                                                        ON freelancers.freelancer_id = history_freelancers.freelancer_id
                                                    INNER JOIN departments
                                                        ON departments.department_id = history_freelancers.department_id
                                                    WHERE
                                                        freelancers.active = '1' AND
                                                        history_freelancers.end_date >= '" . $today . "'
                                                    GROUP BY departments.department_id");

        $data['totalfreelancer'] = $totalfreelancer;
        $data['totalperlasteducation'] = $totalperlasteducation;
        $data['activefreelancer'] = $activefreelancer[0]->total;
        $data['activefreelancerperdepartment'] = $activefreelancerperdepartment;
        $data['inactivefreelancer'] = $totalfreelancer - $activefreelancer[0]->total;

        return view('home', $data);
    }

    public function test()
    {
        $today = date('Y-m-d');
        //dd($today);

        //total freelancer
        $totalfreelancer = Freelancer::where('active', '1')->count();

        //total freelancer by last_education
        $totalperlasteducation = DB::select("SELECT last_education, count(freelancer_id) AS total FROM freelancers WHERE active = '1' GROUP BY last_education");

        //freelancer yang masih bekerja sampai hari ini
        $activefreelancer = DB::select("SELECT 
                                    count(freelancers.freelancer_id) AS 'total'
                                FROM hrfreelancer.history_freelancers 
                                INNER JOIN hrfreelancer.freelancers 
                                ON freelancers.freelancer_id = history_freelancers.freelancer_id
                                WHERE
                                    freelancers.active = '1' AND
                                    history_freelancers.end_date >= '" . $today . "'");

        //freelancer yang masih bekerja sampai hari ini per department
        $activefreelancerperdepartment = DB::select("SELECT 
                                                        department_name,
                                                        COUNT(freelancers.freelancer_id) AS total
                                                    FROM history_freelancers 
                                                    INNER JOIN freelancers 
                                                        ON freelancers.freelancer_id = history_freelancers.freelancer_id
                                                    INNER JOIN departments
                                                        ON departments.department_id = history_freelancers.department_id
                                                    WHERE
                                                        freelancers.active = '1' AND
                                                        history_freelancers.end_date >= '" . $today . "'
                                                    GROUP BY departments.department_id");

        //$activefreelancer = HistoryFreelancer::where('end_date', '>=', "'" . $today . "'")->count();

        $data = array();
        $data['totalfreelancer'] = $totalfreelancer;
        $data['totalperlasteducation'] = $totalperlasteducation;
        $data['activefreelancer'] = $activefreelancer[0]->total;
        $data['activefreelancerperdepartment'] = $activefreelancerperdepartment;
        $data['inactivefreelancer'] = $totalfreelancer - $activefreelancer[0]->total;
        

        dd($data);
    }
}
