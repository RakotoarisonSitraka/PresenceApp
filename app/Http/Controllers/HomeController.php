<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Presence;
use App\Models\Role;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;


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
        $roles= Role::all();
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
    /*détails employes*/
     public function DetailsEmployes(){
        return 'Ok!';
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
        $roles= Role::all();
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
        $roles= Role::all();
        if (isset($_GET['query'])) {
            $search_employee=$_GET['query'];
            // error_log($search_employee) % misolo texte;
            $resultat= DB::table('employees')->where('Nom','LIKE',''.$search_employee.'%')->paginate(3);
            $resultat->appends($request->all());
            return view('employee.EmployeeSearch',['resultat'=> $resultat, 'presence'=> $resultat]);
        }else{
            return view('employee.EmployeeSearch',compact('roles'));
        }
    
   
    }
    /*roles*/
    public function AjoutRole(){
        $roles = Role::orderBy('Type_Role','ASC')->paginate(2);
        $RoleNombre=Role::count();
        // $users= User::with()  orderBy('id','DESC')->paginate(4)
        // return view('ListUser', compact('users'));
        return view('Roles.AjoutRoles', compact('roles','RoleNombre'));
    }
    public function SupprimerRole($id){
        $roles = Role::find($id);
        $roles->delete();
        return back()->with('status', "Role supprimé avec succés!");
    }
    public function SauverRoles(Request $request){
        $request->validate([
            'NomRole' => 'required|string'
        ]);
        $roles = new Role();
        $roles->Type_Role= $request->input('NomRole');
        $donnee = $roles->save();
        if ($donnee) {
            return back()->with("status", "Roles ajouté avec succés!");
        } else {
            return back()->with('error', "Erreur");
        }
    }
    public function ModifierRole(Request $request,$id){
        $roles = Role::find($id);
        if ($roles) {
            // dd($request);
            $roles->Type_Role = $request->input('TypeRole');
            $roles->save();
            return back()->with("status", "Role modifié!");
        }else {
            return back()->with("error", "email name changed with success");
        }
       
          
    }


/*présence*/
    public function Presence(){
        $Presence=Presence::with('employee')->orderBy('Date','DESC')->paginate(3);
        $NbrPresent=Presence::count();
        // $MpiasaInfo=Employee::get();
        // $InfoEmployee=Employee::orderBy('Prenom','DESC');
        return view('employee.PresenceEmployee', compact('Presence','NbrPresent'));
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
    /*liste des présence affichage*/
    public function Heure(Request $request, $id){
        $Presence = Presence::find($id);
        $Role=Role::where('id',$Presence->employee->role_id)->first();  /*fetch roles anle employee 
        izay amle presence no atao eto
           comparaison no atao ato refa mis clé etrangère de le identifiant no comparena atao anaty condition */
        // dd($Role);   
          return view('employee.Heure',compact('Presence','Role'));    
        // return $id;
    }
    public function AnnulerPresence($id)
    {
        $AnnulerPresence = Presence::find($id);
        $AnnulerPresence->delete();         
        return back()->with('status', "Présence annulé !");
    }

    public function Statistique(){
        $users= User::count();
        $mpiasa= Employee::count();
        $fonction=Role::count();
        $RoleAvecNrbEmployee=Role::withCount('employees')->get();
        /*withcount: maka isa miaraka am données... eto zao maka isany employes izay
        misahana ny roles tsirairay..eto zao maka ny nbr ny employes izay mi executer anle role tsirairay
        hoatra ny isany employés misahana ny  web
          */
        foreach ($RoleAvecNrbEmployee as $role) {
            $role->employees=Employee::where('role_id',$role->id)->get();
        }
        /*m fetch withCont mitovy am with ian fa m compte ftsn ...eto zao haka ny employes rehetra misahana 
        ny role tsirairay hoatra hoe iza avy ny employes 15 devellopeurs izany
        le hoe $role->employees io $clé->$valeur mety foan izay valeur atao eo */
        // dd($RoleAvecNrbEmployee); mijery ny details an données 
        return view('employee.Statistique', compact('users','mpiasa','fonction','RoleAvecNrbEmployee'));
        // return view('employee.Statistique');
    }
}
