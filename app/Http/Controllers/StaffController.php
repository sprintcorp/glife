<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
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
        return view('staff.profile',compact('user',$user));
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
         try {
        $request->validate([
            'file'     =>  'image|mimes:jpeg,png,jpg,gif|max:25',
            // 'sign'     =>  'image|mimes:jpeg,png,jpg,gif|max:25'
        ]);
         }catch (\Exception $e){
                alert()->warning('WarningAlert',$e->getMessage());
                return back();
            }

        $user = User::find($id);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->blood = $request['blood'];
        $user->gender = $request['gender'];
        $user->kin = $request['kin'];
        $user->address = $request['address'];

//        $user->matric_no = Auth::user()->matric_no;
        if ($request->has('file')) {
            try {
                $response = $this->fileUpload($request->file('file'));
                    
                // if (!empty($user->image)) {
                //     unlink($user->image);
                // }
                $user->image = $response;
            }catch (\Exception $e){
                alert()->warning('WarningAlert',$e->getMessage());
                return back();
            }
        }

        if ($request->has('sign')) {
            try {
            $response =  $this->fileUpload($request->file('sign'));
            // if(!empty($user->signature)) {
            //     unlink($user->signature);
            // }
            $user->signature = $response;
            }catch (\Exception $e){
                alert()->warning('WarningAlert',$e->getMessage());
                return back();
            }
        }
        $user->save();
        if($request['old_password'] !== ""){
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