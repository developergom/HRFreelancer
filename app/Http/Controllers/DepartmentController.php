<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Gate;
use App\Http\Requests;
use App\Department;
use App\Division;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('Departments Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        return view('vendor.material.master.department.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('Departments Management-Create')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();

        $data['divisions'] = Division::where('active', '1')->orderBy('division_name')->get();

        return view('vendor.material.master.department.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'division_id' => 'required',
            'department_name' => 'required|max:50',
        ]);

        $obj = new Department;

        $obj->division_id = $request->input('division_id');
        $obj->department_name = $request->input('department_name');
        $obj->department_desc = $request->input('department_desc');
        $obj->active = '1';
        $obj->created_by = $request->user()->user_id;

        $obj->save();

        $request->session()->flash('status', 'Data has been saved!');

        return redirect('master/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::denies('Departments Management-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['department'] = Department::with('division')->where('active','1')->find($id);
        return view('vendor.material.master.department.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('Departments Management-Update')) {
            abort(403, 'Unauthorized action.');
        }

        $data = array();
        $data['divisions'] = Division::where('active', '1')->orderBy('division_name')->get();
        $data['department'] = Department::where('active','1')->find($id);
        return view('vendor.material.master.department.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'division_id' => 'required',
            'department_name' => 'required|max:50',
        ]);

        $obj = Department::find($id);

        $obj->division_id = $request->input('division_id');
        $obj->department_name = $request->input('department_name');
        $obj->department_desc = $request->input('department_desc');
        $obj->updated_by = $request->user()->user_id;

        $obj->save();

        $request->session()->flash('status', 'Data has been updated!');

        return redirect('master/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apiList(Request $request)
    {
        $current = $request->input('current') or 1;
        $rowCount = $request->input('rowCount') or 5;
        $skip = ($current==1) ? 0 : (($current - 1) * $rowCount);
        $searchPhrase = $request->input('searchPhrase') or '';
        
        $sort_column = 'department_id';
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
        $data['rows'] = Department::where('departments.active','1')
        					->join('divisions', 'divisions.division_id', '=', 'departments.division_id')
                            ->where(function($query) use($searchPhrase) {
                                $query->orWhere('division_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('department_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('department_desc','like','%' . $searchPhrase . '%');
                            })
                            ->skip($skip)->take($rowCount)
                            ->orderBy($sort_column, $sort_type)->get();
        $data['total'] = Department::where('departments.active','1')
        						->join('divisions', 'divisions.division_id', '=', 'departments.division_id')
                                ->where(function($query) use($searchPhrase) {
                                    $query->orWhere('division_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('department_name','like','%' . $searchPhrase . '%')
                                        ->orWhere('department_desc','like','%' . $searchPhrase . '%');
                                })->count();

        return response()->json($data);
    }


    public function apiDelete(Request $request)
    {
        if(Gate::denies('Departments Management-Delete')) {
            abort(403, 'Unauthorized action.');
        }

        $id = $request->input('department_id');

        $obj = Department::find($id);

        $obj->active = '0';
        $obj->updated_by = $request->user()->user_id;

        if($obj->save())
        {
            return response()->json(100); //success
        }else{
            return response()->json(200); //failed
        }
    }

    public function apiGetByDivision(Request $request)
    {
        if(Gate::denies('Home-Read')) {
            abort(403, 'Unauthorized action.');
        }

        $id = $request->input('division_id');

        $departments = Department::where('division_id', $id)->where('active', '1')->orderBy('department_name')->get();

        $data = array();
        $data['departments'] = $departments;

        return response()->json($data);
    }
}
