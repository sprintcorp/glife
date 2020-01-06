<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use App\User;
use Illuminate\Http\Request;
use App\Imports\ImportUsers;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class StudentController extends Controller
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

        if(auth()->user()->isAdmin === 1) {
//            toast('Your Post as been submited!','success');
            $faculties = Faculty::all();
            return view('students.index',compact('faculties',$faculties));
        }else{
            return view('student.home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return "Hello";
//        $faculties = Faculty::all();
//        $departments = Department::where('faculty_id',$id)->get();
//
//        return view('students.create',compact(['departments',$departments,'faculty',$id]));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = $request['departments'];
        $faculty = $request['faculty'];
        $programme = $request['programme'];
        $level = $request['level'];
        Excel::import(new ImportUsers($department,$faculty,$programme,$level),request()->file('file'));
        return back()->with('toast_success','Student file successfully imported');

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return $id;
        $departments = Department::where('faculty_id',$id)->get();
        $faculty = Faculty::where('id',$id)->first();
        return view('students.create',compact(['departments',$departments,'faculty',$faculty]));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        return view('student.profile',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $student)
    {
        $request->validate([

            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $user = User::find($student->id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if ($request->has('file')) {
            $reques = request();

            $profileImage = $reques->file('file');
            $profileImageSaveAsName = time() . Auth::id() . "file." .
                $profileImage->getClientOriginalExtension();

            $upload_path = 'photo/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
            $user->image = $profile_image_url;
        }
        $user->save();
        if($request['old_password'] != ""){
            if(!(Hash::check($request['old_password'], Auth::user()->password))){
                return redirect()->back()->with('error','Your current Password Does not match the former password');
            }

            if(strcmp($request['old_password'], $request['new_password'])== 0){
                return redirect()->back()->with('error','Your current Password Cannot be the same as your previous password');
            }

            $validation = $request->validate([
                'old_password' =>'required',
                'new_password'=> 'required|string|min:8|confirmed'
            ]);
            $user->password = bcrypt($request['new_password']);
            $user->user_password = $request['new_password'];
            $user->save();


        }



        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        //
    }
}
