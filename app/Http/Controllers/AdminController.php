<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Resources\StudentResource;
use App\Mail\CardNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

//use App\Http\Resources\Student as StudentResource;
class AdminController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = $this->request->all();
        // dd($key['key']." ".env('API_KEY'));
        // if($key['key'] == env('API_KEY')){
        $users = User::where('request',1)->where('isAdmin',0)->where('image','!=',NULL)->where('signature','!=',NULL)->get();
        if($users->count() === 0){
            return response()->json("No Request made for id card");
        }
        return response()->json(StudentResource::collection($users));
        // }
        // return response()->json("You don't have access to this file");
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
    public function store()
    {
        $data = $this->request->all();
        // if($data['key'] === env('API_KEY')) {
            $object = json_decode($data['id'],true);
            foreach ($object as $key => $value) {
                $action =array(
                    'request' => 0
                );
                User::where('id', $object[$key])->where('isAdmin',0)->update($action);
                $users = User::where('id',$object[$key])->where('isAdmin',0)->get();
                Mail::to($users)->send(new CardNotification($users));
            }
            return response()->json('Student Request restored to default');
        // }
    }


}