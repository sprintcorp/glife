<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->matric_no = $request['matric_no'];
        $user->save();
        if($request['old_password'] != ""){
            if(!(Hash::check($request['old_password'], Auth::user()->password))){
                return redirect()->back()->with('toast_error','Your current Password Does not match the former password');
            }

            if(strcmp($request['old_password'], $request['new_password'])== 0){
                return redirect()->back()->with('toast_error','Your current Password Cannot be the same as your previous password');
            }

            $this->validate($request, [
                'old_password' =>'required',
                'new_password'=> 'required|string|min:8|confirmed'
            ]);

            $user->password = bcrypt($request['new_password']);
            $user->user_password = $request['new_password'];
            $user->save();
            Mail::to($user->email)->send(new AdminMail($user));

        }
        return back()->with('toast_success','Profile Updated');
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
