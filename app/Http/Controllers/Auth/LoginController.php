<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'matric_no' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('matric_no' => $input['matric_no'], 'password' => $input['password'])))
        {
            
//            if (auth()->user()->isAdmin === 1) {
//                return redirect()->route('admin.home');
//            }else{
            $user = User::find(auth()->user()->id);
            $user->last_login_at = new \DateTime();
            $user->last_login_ip = $request->getClientIp();
            $user->save();
                return redirect()->route('home');
//            }
        }else{
            return redirect()->route('login')
                ->with('toast_error','Username/Matric no And Password Are Wrong.');
               
        }
    }
    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }
}
