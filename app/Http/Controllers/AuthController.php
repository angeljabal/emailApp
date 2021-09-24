<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PDO;
use Nexmo\Laravel\Facade\Nexmo;

class AuthController extends Controller
{
    public function registrationForm(){
        return view('register');
    }

    public function loginForm(){
        if(auth()->check()){
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function register(Request $request){
        $request->validate([
            'name'      =>  'required|string',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|string',
            'phonenum'  =>  'required|string'
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name'              =>  $request->name,
            'email'             =>  $request->email,
            'password'          =>  bcrypt($request->password),
            'remember_token'    =>  $token,
            'phonenum'          =>  $request->phonenum
        ]);

        Mail::send('verification-email', ['user'=>$user], function($mail) use ($user){
            $mail->to($user->email);
            $mail->subject('Account Verification');
            $mail->from('klaredesteenm4@gmail.com', 'IPT Systems');
        });

        return redirect('/login')->with('Message', 'Your account has been created. Please check your email for verification');
    }

    public function login(Request $request){
        $request->validate([
            'email'     =>  'email|required',
            'password'  =>  'string|required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at==null){
            return redirect('/login')->with('Error', 'Sorry your account is not yet verified.');
        }
        
        $login = auth()->attempt([
            'email' =>  $request->email,
            'password'  =>  $request->password
        ]);

        if(!$login){
            return back()->with('Error', 'Invalid Credentials');
        }

        return redirect('/dashboard')->with('Message', 'Login Successful');
    }

    public function verification(User $user, $token){
        if($user->remember_token !== $token){
            return redirect('login')->with('Error', 'Invalid token. The attached token is invalid or has already been consumed.');
        }

        $user->email_verified_at = now();
        $user->save();

        Nexmo::message()->send([
            'to'    =>  $user->phonenum,
            'from'  =>  'sender',
            'text'  =>  "Hello, $user->name. " . "You have successfully registered your account"
        ]);

        return redirect('/login')->with('Message', 'Your account has been verified. You can login now.');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login')->with('Message', 'Logged out successfully');
    }
}
