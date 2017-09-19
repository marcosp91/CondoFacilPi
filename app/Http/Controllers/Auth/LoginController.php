<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use function redirect;
use function view;

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
    
    public function login(){
        return view('auth.login');
    }
    
    public function autentica(Request $request){
        $dadosLogin = $request->all();
        $email = $dadosLogin['email'];
        $senha = $dadosLogin['senha'];
            
            $usuario = DB::table('usuarios')
                     ->select('*')
                     ->where('email', '=', $email)
                     ->where('senha', '=', $senha)
                     ->get()
                     ->first();
        
        if ($usuario){
            session_start();    
            $_SESSION['usuario'] = $usuario;
        }
        
        if(isset($_SESSION))
        {
            return redirect()->route('perfil.editar');
        }
        else{
            return redirect()->route('login.index');
        }
            
             
    }
    
    public function autenticado(){
        return view('dashboard.perfil');
    }
}
