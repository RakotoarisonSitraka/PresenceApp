<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        //return view('home');
        $users = User::all();
        return view('home', compact('users'));
    }



    public function ChangePassword()
    {
        # code...
        return view('change-pass');
    }



    public function updatePassword(Request $request)
    {
        // $users = User::find(Auth::user()->id);
        #VALIDATION
        $request->validate([
            'Ancien_mot_de_passe' => 'required',
            'Nouveau_mot_de_passe' => 'required|min:4',
        ]);
        if (strcmp($request->get('Ancien_mot_de_passe'), $request->get('Nouveau_mot_de_passe')) == 0) {
            //STRCMP: fonction permet de comparer deux chaînes de caractères et de savoir 
            //si la première est inférieure, égale ou supérieure à la seconde.
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        #correspondance d'ancien mot de passe raa mdp tsizy no ataony eo am ancien mdp
        if (!(Hash::check($request->get('Ancien_mot_de_passe'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        User::whereId(auth()->User()->id)->update([
            'password' => Hash::make($request->Nouveau_mot_de_passe)

        ]);
        return back()->with("status", "password changed with success");
        // dd($request->all()); Dump and die(manapoitra valeur request d aveo tapahany le action tokon andeha)

    }
    #modification email
    public function modifier(Request $request)
    {
        $users = user::find(Auth::user()->id);
        $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);
        if ($users) {
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            //   $users->password=$request->input('password');
            $users->save();
            return redirect('/home');
        } else {
            return back()->with("error", "password changed with success");
        }
    }
}
