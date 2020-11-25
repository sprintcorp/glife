<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use App\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = $this->request->get('id');
        dd($id);
        $students = User::where('department_id',$id)->paginate(30);
        dd($students);
        return view('students.show',compact('students',$students));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'faculty' => 'required|integer',
            'department'=> 'required'
        ]);
        $department = new Department();
        $department->faculty_id = $request->input('faculty');
        $department->name = $request->input('department');
        $department->save();
        return back()->with('toast_success','department of '.$request->input('department').' has been successfully added to faculty');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $level = $this->request->all();
//        return $level;
        
        $students = User::where('department_id',$id)->paginate(30);
        dd($students);
        return view('students.show',compact('students',$students));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
//        return $department->id;
        $departments = Department::find($department->id);
//        return $department;
        if($departments){
            $departments->delete();
            return back()->with('toast_success',$departments->name.' deleted successfully');
        }else {
            return back()->with('toast_error', 'Record not Deleted');
        }
    }
}
