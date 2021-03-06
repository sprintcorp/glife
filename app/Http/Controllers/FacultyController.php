<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Session;
use App\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
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
        $student = User::where('isAdmin',0)->get();
//        $faculty = Faculty::
        return view('students.list',compact('student',$student));
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
            'faculty' => 'required'
        ]);
        $faculty = new Faculty();
        $faculty->name = $request->input('faculty');
        $faculty->save();
        return back()->with('toast_success',$request->input('faculty').' faculty has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return $id;
        $department = Department::where('faculty_id',$id)->get();
        return view('faculty.show',compact('department',$department));
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
     * @param Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculties = Faculty::find($faculty->id);

        if($faculties){
            $faculties->delete();
            return back()->with('toast_success',$faculties->name.' deleted successfully');
        }else {
            return back()->with('toast_error', 'Record not Deleted');
        }
    }
}
