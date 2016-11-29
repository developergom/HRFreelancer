<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Gate;

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
        $data['year'] = date('Y');
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

        //freelancer yang akan berakhir kontraknya
        $willexpirefreelancer = DB::select("SELECT 
                                                freelancers.freelancer_id, 
                                                freelancers.name,
                                                history_freelancers.department_id,
                                                department_name,
                                                division_name,
                                                history_freelancers.position_id,
                                                position_name,
                                                history_freelancers.end_date,
                                                datediff(history_freelancers.end_date, '" . $today . "') AS difference
                                            FROM 
                                                hrfreelancer.freelancers 
                                            INNER JOIN hrfreelancer.history_freelancers ON history_freelancers.freelancer_id = freelancers.freelancer_id
                                            INNER JOIN hrfreelancer.positions ON positions.position_id = history_freelancers.position_id
                                            INNER JOIN hrfreelancer.departments ON departments.department_id= history_freelancers.department_id
                                            INNER JOIN hrfreelancer.divisions ON divisions.division_id= departments.division_id
                                            WHERE 
                                                freelancers.active = '1' AND
                                                datediff(history_freelancers.end_date, '" . $today . "') <= 30 AND
                                                datediff(history_freelancers.end_date, '" . $today . "') > 0
                                            ORDER BY difference");

        $data['totalfreelancer'] = $totalfreelancer;
        $data['totalperlasteducation'] = $totalperlasteducation;
        $data['activefreelancer'] = $activefreelancer[0]->total;
        $data['activefreelancerperdepartment'] = $activefreelancerperdepartment;
        $data['inactivefreelancer'] = $totalfreelancer - $activefreelancer[0]->total;
        $data['willexpirefreelancer'] = $willexpirefreelancer;

        //dd($data);

        return view('home', $data);
    }

    public function apiGetTotalPerMonth() {
        if(Gate::denies('Home-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        //freelancer yang aktif per bulan
        $tgl = $this->generateStartEndDatePerYear(date('Y'));
        $activefreelancerpermonth = array();
        foreach ($tgl as $key => $value) {
            $start_date = $value['start_date'];
            $end_date = $value['end_date'];

            $q = DB::select("SELECT 
                                count(history_freelancer_id) AS total
                            from 
                                history_freelancers 
                            INNER JOIN freelancers ON freelancers.freelancer_id = history_freelancers.freelancer_id
                            WHERE 
                                (
                                    (start_date <= '" . $start_date . "' AND end_date >= '" . $end_date . "') OR
                                    (start_date <= '" . $start_date . "' AND end_date >= '" . $start_date . "' AND end_date <= '" . $end_date . "') OR
                                    (start_date >= '" . $start_date . "' AND start_date <= '" . $end_date . "' AND end_date >= '" . $end_date . "') OR
                                    (start_date >= '" . $start_date . "' AND end_date <= '" . $end_date . "')
                                ) 
                                AND freelancers.active = '1'");
            $activefreelancerpermonth[$key]['month_name'] = $value['month_name'];
            $activefreelancerpermonth[$key]['total'] = $q[0]->total;
        }

        $data['activefreelancerpermonth'] = $activefreelancerpermonth;

        return response()->json($data);
    }

    public function apiGetTotalPerGender() {
        if(Gate::denies('Home-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        $q = DB::select("
                    SELECT 
                        gender, COUNT(freelancer_id) AS total
                    FROM hrfreelancer.freelancers 
                    WHERE 
                        active = '1' 
                    GROUP BY gender");

        $data['result'] = $q;

        return response()->json($data);
    }

    public function apiGetTotalPerEducation() {
        if(Gate::denies('Home-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        $q = DB::select("
                    SELECT 
                        last_education AS education, COUNT(freelancer_id) AS total
                    FROM hrfreelancer.freelancers 
                    WHERE 
                        active = '1' 
                    GROUP BY last_education");

        $data['result'] = $q;

        return response()->json($data);
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

        //freelancer yang aktif per bulan
        $tgl = $this->generateStartEndDatePerYear(date('Y'));
        $activefreelancerpermonth = array();
        foreach ($tgl as $key => $value) {
            $start_date = $value['start_date'];
            $end_date = $value['end_date'];

            $q = DB::select("SELECT 
                                count(history_freelancer_id) AS total
                            from 
                                history_freelancers 
                            INNER JOIN freelancers ON freelancers.freelancer_id = history_freelancers.freelancer_id
                            WHERE 
                                (
                                    (start_date <= '" . $start_date . "' AND end_date >= '" . $end_date . "') OR
                                    (start_date <= '" . $start_date . "' AND end_date >= '" . $start_date . "' AND end_date <= '" . $end_date . "') OR
                                    (start_date >= '" . $start_date . "' AND start_date <= '" . $end_date . "' AND end_date >= '" . $end_date . "') OR
                                    (start_date >= '" . $start_date . "' AND end_date <= '" . $end_date . "')
                                ) 
                                AND freelancers.active = '1'");
            $activefreelancerpermonth[$key]['month_name'] = $value['month_name'];
            $activefreelancerpermonth[$key]['total'] = $q[0]->total;
        }
        



        $data = array();
        $data['totalfreelancer'] = $totalfreelancer;
        $data['totalperlasteducation'] = $totalperlasteducation;
        $data['activefreelancer'] = $activefreelancer[0]->total;
        $data['activefreelancerperdepartment'] = $activefreelancerperdepartment;
        $data['inactivefreelancer'] = $totalfreelancer - $activefreelancer[0]->total;
        $data['activefreelancerpermonth'] = $activefreelancerpermonth;
        

        dd($data);
    }

    private function generateStartEndDatePerYear($year) {
        $tgl = array();
        for($i = 1; $i <= 12; $i++) {
            $start_date = $year . '-' . $i . '-01';
            $tanggal = Carbon::createFromFormat('Y-m-d', $start_date);
            $bulan = $tanggal->format('m');
            $start_date = $tanggal->toDateString();
            $end_date = $year . '-' . $bulan . '-' . $tanggal->daysInMonth;
            $tgl[$i]['start_date'] = $start_date;
            $tgl[$i]['end_date'] = $end_date;
            $tgl[$i]['month_name'] = $tanggal->format('F');
        }

        return $tgl;
    }
}
