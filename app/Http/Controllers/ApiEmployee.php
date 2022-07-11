<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class ApiEmployee extends Controller
{
    //ilay mampiditra donneés anaty tabel dia atao m retourne JSON fa tsy view tsotra
    public function SaveEmployee(Request $request){
        $Employee=new Employee();
        $Employee->Nom =$request->input('Nom');
        $Employee->Prenom=$request->input('Prenom');
        $Employee->Email=$request->input('Email');
        // $Employee->DateNaissance=$request->input('DateNaissance');
        $Employee->Telephone=$request->input('Telephone');
        $Employee->Photo=$request->input('Photo');
        $Employee->save();
        $data=$Employee->save();
        if(!$data){
             return response()->json([
                'status'=>400,
                'error'=>'quelque chose semble ne peut pas s"en aller'
             ]);
        }
        else{
            return response()->json([
                'status'=>200,
                'message'=>'donné bien inseré'
            ]);
        }
    }
    //function mampiseho anle données rehetra avy am JSON 
    public function MampisehoEmployee(){
        $Employee= Employee::all();
       
        if(isset($Employee)){//raha mis ilay izy zan hoe ilay $employee efa mis..dia afficher'ho anaty json le message

             return response()->json([
                'les employees'=>$Employee
             ]);
        }
        else{//contrepartie raha ts mis zan le donnes $employee izany hoe tsy hitany
            return response()->json([
                '400'=>'Données introuvable',
            ]);

        }
    } 
}
