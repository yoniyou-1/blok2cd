<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/';

   public function __construct()
    {   
        //dd(session()->all());
        $this->middleware('guest')->except('logout');
        //dd('holaa');
        //if($this->Auth('guest')){ dd('holak');}
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //dd(session()->all(),'hola');
        return view('seguridad.index');
    }


     protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->where('state', 1)->get();
        if ($roles->isNotEmpty()) {
            //dd(session()->all(),'hola3');
            $user->setSession($roles->toArray());

        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguridad/login')->withErrors(['error' => 'Este usuario no tiene un rol activo']);
        }
    }


        public function username()
    {
        return 'user';
    }
}