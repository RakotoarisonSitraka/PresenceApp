<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    //CRUD EMPLOYEE
    public function AjoutEmployee()
    {
        // return view('employee.ajout-employee');
        return view('employee.registrerEmployee');
    }
    public function AddEmployee(Request $request)
    {
        // Storage::disk('local')->put('anarana dossier', $request->file('name nle sary am input'));
        // mitest hoe stocker anaty storage v le fichier
        // die(); arreter l'excution du code et rend une page vide
    //    $name= Storage::disk('local')->put('ImageEmployee', $request->Sary);
    //    dd(storage::get($name));
        $request->validate([
            'Anarana' => 'required',
            'Fanampiny' => 'required',
            'Mailaka' => 'required',/*nom anle table ao am bd no atao ao aorina an le unique*/
            'Laharana' => 'required|numeric',
            'Sary' => 'required|image|mimes:jpeg,png,jpg|max:1048',
            'Age' => 'required|numeric',
            'CIN' =>'required',
            'Adresse' =>'required',
        ]);
        $employer = new Employee();
        $employer->Nom = $request->input('Anarana');
        $employer->Prenom = $request->input('Fanampiny');
        $employer->Email = $request->input('Mailaka');
        $employer->Telephone = $request->input('Laharana');
        $employer->Age = $request->input('Age');
        $employer->CIN = $request->input('CIN');
        $employer->Addresse = $request->input('Adresse');
        $employer->Sexe = $request->input('Sexe');
        $employer->Position = $request->input('Position');
        $employer->Section = $request->input('Section');
        $employer->Ville = $request->input('Ville');
        //$employer->Profil= $request->input('Sary');
        $employer->Profil=$filename= time() .'.' .$request->Sary->extension();
        $request->file('Sary')->storeAs(
            'ImageEmployee',
            $filename,
            'public'
        );
        $donnees = $employer->save();
        if ($donnees) {
            return redirect('/home')->with("status", "l'employée est  inseré avec succés!");
        } else {
            return back()->with('error', "Erreur");
        }
    }
    /*affichage employee*/
    public function AfficherEmployer()
    {
        //return view('home');
        $Employes = Employee::orderBy('id','DESC')->paginate(4);
        return view('home', compact('Employes'));
    }
    /*Suppression staff*/
    public function SupprimerEmployer($id)
    {
        $staff = Employee::find($id);
        $staff->delete();
        // $staff= DB ::table('employees')
        //              ->where('id',$id)
        //              ->first();

        //   DB::table('employees')
        //      ->where('id',$id)
        //      ->delete();           
        return back()->with('status', "l'employé est Supprimé de la liste");
    }
    /*fonction du recherche d'employées*/
    
    public function Recherche(Request $request){
        // error_log("tongfa eto");
        if (isset($_GET['query'])) {
            $search_employee=$_GET['query'];
            // error_log($search_employee) % misolo texte;
            $resultat= DB::table('employees')->where('Nom','LIKE',''.$search_employee.'%')->paginate(3);
            $resultat->appends($request->all());
            return view('employee.EmployeeSearch',['resultat'=> $resultat, 'presence'=> $resultat]);
        }else{
            return view('employee.EmployeeSearch');
        }
    
   
    }

    public function Presence(){
        return view('employee.PresenceEmployee');
    }
}
