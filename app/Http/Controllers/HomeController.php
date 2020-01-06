<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin === 1) {
//            toast('Your Post as been submited!','success');
            $faculties = Faculty::all();
            $departments = Department::all();

            return view('admin.home',compact(['faculties',$faculties,'departments',$departments]));
        }else{
            return view('student.home');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.home');
    }
}
