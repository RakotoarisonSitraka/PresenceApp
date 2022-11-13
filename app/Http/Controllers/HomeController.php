<?php

namespace App\Http\Controllers;

use App\Models\Demission;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Presence;
use App\Models\Role;
use App\Models\Domaine;
use App\Models\Projet;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use League\MimeTypeDetection\FinfoMimeTypeDetector;

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
        $Domaine=Domaine::all();
        return view('employee.registrerEmployee',compact('roles','Domaine'));
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
        $employer->Age = $request->input('Age');
        $employer->CIN = $request->input('CIN');
        $employer->Addresse = $request->input('Adresse');
        $employer->Sexe = $request->input('Sexe');
        $employer->DateEntree = $request->input('DateEntree');
        $employer->Ville = $request->input('Ville');
        $employer->role_id = $request->input('role');
        $employer->domaine_id = $request->input('Domaine');
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
            $employer->domaine_id = $request->input('Domaine');
            $employer->DateEntree = $request->input('DateEntree');
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
            return redirect('/home')->with("status", "Données bien modifié avec succés!");
        } else {
            return back()->with("error", "email name changed with success");
        }
        
     }
     public function DetailsEmployee($id){
        // $Presence = Presence::find($id);
      
        //     $Role=Role::where('id',$Presence->employee->role_id)->first(); 
          $DetailsEmployee= Employee::find($id);
          $role=Role::where('id',$DetailsEmployee->role_id)->first();
        //   $Domaine=Domaine::where('id',$DetailsEmployee->employees->domaine_id);
         $Domaine=Domaine::where('id',$DetailsEmployee->domaine_id)->first();
          return view('employee.details',compact('DetailsEmployee','role','Domaine'));
     }
    /*affichage employee*/
    public function AfficherEmployer()
    {
        //return view('home');
        $Domaine=Domaine::all();
        $roles= Role::all();
        $Employes = Employee::orderBy('id','DESC')->paginate(4);
        return view('home', compact('Employes','roles','Domaine'));
    }
    /*Suppression staff*/
    public function SupprimerEmployer($id)
    {

        $staff = Employee::find($id);/*tedavo aloh le employee concerne*/
        $staff->delete();
        Presence::where("employee_id", $id)->delete();/*sad vofafa koa le employee concerne 
         rah mitobvy am le cle etrangere tokoa ilay concerne de fafao */
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
            return view('employee.EmployeeSearch',compact('resultat'));
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
    //    dd($Presence);
        $Role=Role::where('id',$Presence->employee->role_id)->first(); 
         /*fetch roles anle employee 
        izay amle presence no atao eto
           comparaison no atao ato refa mis clé etrangère de le identifiant no comparena atao anaty condition */
        // dd($Role);   
        /*
           $date1 = now();
           $date2 = now()->addDay();
           $difference = $date1->diff($date2);
       // This give s a DateInterval instance*/
       //$date1=$Presence->Heure_Entree;
       $HeureEntree = new Carbon($Presence->Heure_Entree);
    //    dd($date1);
       $HeureSortie=$Presence->Heure_Sortie;
       $differenceHeure =  $HeureEntree->diffInHours($HeureSortie);
    //    dd($differenceHeure);
     
          return view('employee.Heure',compact('Presence','Role','differenceHeure'));    
        // return $id;
      
        
      
    }
    public function AnnulerPresence($id)
    {
        $AnnulerPresence = Presence::find($id);
        $AnnulerPresence->delete();         
        return back()->with('status', "Présence annulé !");
    }
    public function rechercheDate(Request $request){
        // $Presence=Presence::with('employee')->orderBy('Date','DESC')->paginate(3);
        $NbrPresent=Presence::count();
        if (isset($_GET['SearchDate'])) {
            $search_date=$_GET['SearchDate']; /*'%Y-%m-%d','LIKE', '%'.$date.'%'*/
            // error_log($search_employee) % misolo texte;
            $resultat=Presence::with('employee')->orderBy('Date','DESC')->where('Date','LIKE','%'.$search_date.'%')->paginate(3);
            $resultat->appends($request->all());
            return view('employee.resultatRechercheDate',compact('resultat','NbrPresent'));
        }
    }

    public function Statistique(){
        $users= User::count();
        $mpiasa= Employee::count();
        $fonction=Role::count();
        $Domainess=Domaine::count();
        $Projet=Projet::count();
        $RoleAvecNrbEmployee=Role::withCount('employees')->orderBy('Type_Role','ASC')->paginate(3);
        $DomaineAvecNbrProjet=Domaine::withCount('projets')->orderBy('NomDomaine','ASC')->paginate(2);
        foreach ($DomaineAvecNbrProjet as $Domaine) {
            $Domaine->projets=Projet::where('domaine_id',$Domaine->id)->get();
        }
        // $Admin = User::orderBy('name','ASC')->paginate(2);
        // $users = User::orderBy('id','ASC')->paginate(1);
        // $users= User::with()  orderBy('id','DESC')->paginate(4)
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
        return view('employee.Statistique', compact('users','mpiasa','fonction','RoleAvecNrbEmployee','DomaineAvecNbrProjet','Domainess','Projet'));
        // return view('employee.Statistique');
    }

    /* domaine*/
    public function InsertionDomaine(Request $request){
        $request->validate([
            'NomDomaine' => 'required|string',
        ]);
        $Domaine= new Domaine();
        $Domaine->NomDomaine= $request->input('NomDomaine');
        $Donnes = $Domaine->save();
        if ($Donnes) {
            return redirect('/ListeDesDomaines')->with("status","Le domaine ". $Domaine->NomDomaine. " integré avec succés!");
        } else {
            return back()->with('error', "Erreur");
        }
    }
    public function ListeDesDomaines(){
        // $listedomaine=Domaine::orderBy('NomDomaine','ASC')->paginate(5);
        $listedomaine=Domaine::withCount('employees','Projets')->orderBy('NomDomaine','ASC')->paginate(5);
        foreach ($listedomaine as $listedomaines) {
            $listedomaines->employees=Employee::where('domaine_id',$listedomaines->id)->get();
        }
        $CountDomaine=Domaine::count();
        // dd($listedomaine);
        return view('employee.Domaine',compact('listedomaine','CountDomaine'));
       
    }
    public function ModifierDomaine(Request $request ,$id){
        $ModifDomaine = Domaine::find($id);
        if ($ModifDomaine) {
            // dd($request);
            $ModifDomaine->NomDomaine= $request->input('NomDomaine');
            $ModifDomaine->save();
        
            return back()->with("status", " le domaine a été bien modifié!");
        }else {
            return back()->with("error", "email name changed with success");
        }

    }
    public function SupprimerDomaine($id){
        // ::where('domaine_id',$listedomaines->id) $Role=Role::where('id',$Presence->employee->role_id)->first(); 
        // $SupprimerDomaine = Domaine::join(Projet::class)->where("id", $id)->delete();
        Domaine::where('id',$id)->delete();
        Projet::where('domaine_id',$id)->delete();
        return back()->with('status', " Domaine retiré avec succés!");
    }
/*projet*/
    public function ListProjet(){
        // $roles= ::all();
        // $Employes = Employee::orderBy('id','DESC')->paginate(4);
        // return view('home', compact('Employes','roles'));
        // $Presence=Presence::with('employee')->orderBy('Date','DESC')->paginate(3);
        // $Role=Role::where('id',$Presence->employee->role_id)->first(); 
        $ListeProjets= Projet::with('domaine')->orderBy('DateCreation','DESC')->paginate(5);
        $Domaines= Domaine::all();
        return view('employee.ListProjet',compact('Domaines','ListeProjets'));
    }
   
    public function InsertionProjet(Request $request){
        $request->validate([
            'NomDuProjet' => 'required|string',
        ]);
        $Projet= new Projet();
        $Projet->NomDuProjet= $request->input('NomDuProjet');
        $Projet->DateCreation= $request->input('DateCreation');
        $Projet->Description= $request->input('Description');
        $Projet->Etat= $request->input('Etat');
        $Projet->domaine_id= $request->input('domaineDuProjet');
        $Donnes = $Projet->save();
        if ($Donnes) {
            return redirect('/ListProjet')->with("status", " projet ajouté avec succés!");
        } else {
            return back()->with('error', "Erreur");
        }
    }
    public function Demission(){
        return view('employee.Demission');
    }
   
    public function AjoutDemission(Request $request){
        $request->validate([
            'Raison' => 'required|string',
            'Date' => 'required',
            'NomEmployee' =>'required',
            'NomEmployee' =>'required',
        ]);
        $Demission = new Demission();
        $Demission->NomEmployee=$request->input('NomEmployee');
        $Demission->PrenomEmployee=$request->input('PrenomEmployee');
        $Demission-> DateDemission=$request->input('DateDemission');
        $Demission->Raison= $request->input('Raison');
        
        $donnee = $Demission->save();
       dd($donnee);
    }
}
