<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Presence;
use App\Models\Roles;
use Illuminate\Http\File;
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
        $users = User::orderBy('id','ASC')->paginate(1);
        // $users= User::with()  orderBy('id','DESC')->paginate(4)
        return view('ListUser', compact('users'));
    }
    public function SupprimerUser($id){
        $staff = User::find($id);
        $staff->delete();   

        return view('ListUser')->with('status', "l'employé est Supprimé de la liste");
        //  return 'ok!';

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
            return back()->with("error", "email name changed with success");
        }
    }

    //CRUD EMPLOYEE
    public function AjoutEmployee()
    {
        // return view('employee.ajout-employee'); manao affichage nle role
        $roles= Roles::all();
        return view('employee.registrerEmployee',compact('roles'));
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
            // 'Matricule'=>'Required|numeric',
            'Sary' => 'required|image|mimes:jpeg,png,jpg|max:1048',
            'Age' => 'required|numeric',
            'CIN' =>'required',
            'Adresse' =>'required',
            'role'=>'required' ,
        ]);
        $employer = new Employee();
        $employer->Nom = $request->input('Anarana');
        $employer->Prenom = $request->input('Fanampiny');
        $employer->Email = $request->input('Mailaka');
        $employer->Telephone = $request->input('Laharana');
        // $employer->Matricule = $request->input('Matricule');
        $employer->Age = $request->input('Age');
        $employer->CIN = $request->input('CIN');
        $employer->Addresse = $request->input('Adresse');
        $employer->Sexe = $request->input('Sexe');
        // $employer->Position = $request->input('Position');
        // $employer->Section = $request->input('Section');
        $employer->Ville = $request->input('Ville');
        $employer->role_id = $request->input('role');
        //$employer->Profil= $request->input('Sary');
        $employer->Profil=$filename= time() .'.' .$request->Sary->extension();
        $request->file('Sary')->storeAs(
            'ImageEmployee',
            $filename,
            'public'
        );
        $donnees = $employer->save();
        if ($donnees) {
            return redirect('/home')->with("status", "employé inseré avec succés!");
        } else {
            return back()->with('error', "Erreur");
        }
    }

    /*modifier l'employes*/
     public function ModifierEmployee(Request $request, $id){
        $employer = Employee::find($id);
        if ($employer) {
            // dd($request);
            $employer->Nom = $request->input('Anarana');
            $employer->Prenom = $request->input('Fanampiny');
            $employer->Email = $request->input('Mailaka');
            $employer->Telephone = $request->input('Laharana');
            // $employer->Matricule = $request->input('Matricule');
            $employer->Age = $request->input('Age');
            $employer->CIN = $request->input('CIN');
            $employer->Addresse = $request->input('Adresse');
            $employer->Sexe = $request->input('Sexe');
            $employer->role_id = $request->input('role');
            // $employer->Position = $request->input('Position');
            // $employer->Section = $request->input('Section');
            $employer->Ville = $request->input('Ville');
            if ($request["Sary"]) {
                $employer->Profil=$filename= time() .'.' .$request["Sary"]->extension();
                $request->file('Sary')->storeAs(
                    'ImageEmployee',
                    $filename,
                    'public'
                );
            }
            
            $employer->save();
        //    dd($employer->save());
            return redirect('/home')->with("status", "Donnée bien modifié avec succés!");
        } else {
            return back()->with("error", "email name changed with success");
        }
        
     }
    /*affichage employee*/
    public function AfficherEmployer()
    {
        //return view('home');
        $roles= Roles::all();
        $Employes = Employee::orderBy('id','DESC')->paginate(4);
        return view('home', compact('Employes','roles'));
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
    /*roles*/
    public function AjoutRole(){
        $roles = Roles::orderBy('id','DESC')->paginate(2);
        // $users= User::with()  orderBy('id','DESC')->paginate(4)
        // return view('ListUser', compact('users'));
        return view('Roles.AjoutRoles', compact('roles'));
    }
    public function SauverRoles(Request $request){
        $request->validate([
            'NomRole' => 'required|string'
        ]);
        $roles = new Roles();
        $roles->Type_Role= $request->input('NomRole');
        $donnee = $roles->save();
        if ($donnee) {
            return back()->with("status", "Roles ajouté avec succés!");
        } else {
            return back()->with('error', "Erreur");
        }
    }

/*présence*/
    public function Presence(){
        $Presence=Presence::with('employee')->orderBy('Date','DESC')->paginate(3);
        // $MpiasaInfo=Employee::get();
        // $InfoEmployee=Employee::orderBy('Prenom','DESC');
        return view('employee.PresenceEmployee', compact('Presence'));
    }
    public function SauverPresence(Request $request){
        $request->validate([
            'Dynamisme' => 'required|string',
            'Date' => 'required',
        ]);
        $Presence = new Presence();
        $Presence->employee_id = $request->input('employeeId');
        $Presence->Options= $request->input('Dynamisme');
        $Presence->Date= $request->input('Date');
        $Presence->Heure_Entree= $request->input('HeureEntre');
        $Presence->Heure_Sortie= $request->input('HeureSortie');
        $donnee = $Presence->save();
        if ($donnee) {
            return redirect('/Presence')->with("status", "Presence enregistré avec succés!");
        } else {
            return back()->with('error', "Erreur");
        }
    }


    public function Statistique(){
        $users= User::count();
        $mpiasa= Employee::count();
        return view('employee.Statistique', compact('users','mpiasa'));
        // return view('employee.Statistique');
    }
}
