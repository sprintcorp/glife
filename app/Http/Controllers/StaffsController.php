<?php

namespace App\Http\Controllers;

use App\Department;
use App\Mail\UserCreated;
use App\Mail\UserUpdate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::where('isAdmin',2)->paginate(30);
        return view('staffs.index',compact('staffs',$staffs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('staffs.create',compact('departments',$departments));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $num = str_shuffle('1234567890');
        $code1= substr(str_shuffle($alpha),0,4);

        $code2 = substr(str_shuffle($num),0,5);

        $random = $code1.$code2;

        $matric_no = $request->matric_no;
        $email = $request->email;
        $department = $request->department;
        $designation = $request->designation;
        $password = $random;
        for($count = 0; $count < count($matric_no); $count++)
        {
            $data = array(
                'matric_no' => $matric_no[$count],
                'email' => $email[$count],
                'password'  => Hash::make($password),
                'user_password' => $password,
                'designation' => $designation[$count],
                'isAdmin' => '2',
                'department_id' => $department[$count]
            );

            $insert_data[] = $data;
            Mail::to($data['email'])->send(new UserCreated($data));
        }
        User::insert($insert_data);
        return back()->with('toast_success',$count. ' Staffs has been successfully registered');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        if($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->user_password = $request->user_password;
        }
        if($request->matric_no !== $user->matric_no){
            $user->matric_no = $request->matric_no;
        }
        if($request->email !== $user->email){
            $user->email = $request->email;
        }

        if($request->designation !== $user->designation){
            $user->designation = $request->designation;
        }
        if(!$user->isDirty()){
            return back()->with('toast_error','You need to specify a different value to update',422);
        }

        $user->save();

        Mail::to($user->email)->send(new UserUpdate($user));
        return back()->with('toast_success','User Successfully updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = User::find($id);

        if($staff){
            $staff->delete();
            return back()->with('toast_success',$staff->name.' deleted successfully');
        }else {
            return back()->with('toast_error', 'Record not Deleted');
        }
    }
}
