<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Resources\StudentResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if($key['key'] === env('API_KEY')){
        $users = User::where('request',1)->get();
        if($users->count() === 0){
            return response()->json("No Request made for id card");
        }
        return response()->json(StudentResource::collection($users));
        }
        return response()->json("You don't have access to this file");
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
        $key = $this->request->all();
        if($key['key'] === env('API_KEY')) {
//            return response()->json(true);
            DB::table('users')->where('request', 1)->update(['request' => 0]);
            return response()->json('Student Request restored to default');
        }
        return response()->json(false);
//            return response()->json(env('APP_KEY'));
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
}
