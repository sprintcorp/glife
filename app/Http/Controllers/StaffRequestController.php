<?php

namespace App\Http\Controllers;

use App\Http\Resources\StaffResource;
use App\Mail\CardNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StaffRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = $this->request->all();
        // if($key['key'] === env('API_KEY')){
            $users = User::where('request',1    )->where('isAdmin',2)->get();
            if($users->count() === 0){
                return response()->json("No Request made for id card");
            }
            return response()->json(StaffResource::collection($users));
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
                'request' => 2
            );

         User::where('id', $object[$key])->where('isAdmin',2)->update($action);
            $users = User::where('id',$object[$key])->where('isAdmin',2)->get();
//            dd($value);
           Mail::to($users)->send(new CardNotification($users));
        }
            return response()->json('Staff Request restored to default');
        // }
        // return response()->json('Invalid APP KEY');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}