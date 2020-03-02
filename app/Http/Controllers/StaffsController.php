<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
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
        $staffs = User::where('isAdmin',2)->get();
//        dd($staffs);
        return view('staffs.index',compact('staffs',$staffs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $rules = [
//            'matric_no'  => 'required',
//            'email'  => 'required|email|unique:users',
//            'password'  => 'required|min:6'
//            ];
//
//        $this->validate($request, $rules);
        $matric_no = $request->matric_no;
        $email = $request->email;
        $password = $request->password;
        for($count = 0; $count < count($matric_no); $count++)
        {
            $data = array(
                'matric_no' => $matric_no[$count],
                'email' => $email[$count],
                'password'  => Hash::make($password[$count]),
                'user_password' => $password[$count],
            );

            $insert_data[] = $data;

        }
        User::insert($insert_data);
        Mail::to($insert_data)->send(new UserCreated($insert_data));

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
