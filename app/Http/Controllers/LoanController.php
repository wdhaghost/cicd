<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Loan;
use App\Models\Student;
use App\Mail\LoanReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoanController extends Controller
{
    //// Afficher la liste des prêts
    public function index()
    {
        // Votre logique pour récupérer la liste des prêts depuis la base de données
        $loans = Loan::with(['student','equipment'])->get(); // Récupérer tous les prêts depuis la base de données
       
        return view('loans.index', ['loans' => $loans]);
    }

    // Afficher le formulaire de création d'un prêt
    public function create()
    {
        $students = Student::all();
        $equipments = Equipment::where('quantity','>',0)->get();
        return view('loans.create',['students' => $students, 'equipments' => $equipments]);
        // Votre logique pour afficher le formulaire de création
    }

    // Enregistrer un nouveau prêt
    public function store(Request $request)
    {
     
            $request->validate([
            'loan_date' => 'required|date',
            'equipment_id' => 'required|exists:equipments,id',
            'student_id' => 'required|exists:students,id',
        ]);
      

        $loan = new Loan;
        $loan->loan_date = $request->loan_date;
        $return_date = $request->loan_date;
        $return_date = date('Y-m-d', strtotime($return_date. ' + 7 days'));
        $loan->return_date = $return_date;
        $equipment = Equipment::find($request->equipment_id) ;
        if($equipment->quantity == 0){
            return redirect()->route('loans.create')->with('error', 'Le matériel n\'est plus disponible.');
        }
        $equipment->quantity = $equipment->quantity - 1;
        $equipment->save();
        $loan->student()->associate($request->student_id);
        $loan->equipment()->associate($request->equipment_id);
        $loan->save();
        $student = Student::find($request->student_id);
        Mail::to($student->mail)->send(new LoanReminder($loan));
        return redirect()->route('loans.index')->with('success', 'Le prêt a été enregistré avec succès.');

        
    }

    // Afficher les détails d'un prêt spécifique
    public function show( $id)
    {
        $loan = Loan::with (['student','equipment'])->findOrFail($id);
       
        return view('loans.show', ['loan' => $loan]);
        // Votre logique pour afficher les détails
    }

    // Afficher le formulaire de modification d'un prêt
    public function edit(Loan $id)
    {
        // Votre logique pour afficher le formulaire de modification
    }

    // Mettre à jour un prêt existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'returned' => 'required|Integer|in:0,1',
        ]);
      

        $loan = Loan::findOrFail($id);
        if($loan->returned ==1){
            return redirect()->route('loans.index')->with('error', 'Le matériel a déjà été retourné.');
        }
        $equipment = Equipment::find($loan->equipment_id);
        $equipment->quantity = $equipment->quantity + 1;
        $equipment->save(); 
        $loan->returned = $request->returned;
        $loan->save();
        return redirect()->route('loans.index')->with('success', 'Le retour a été enregistré avec succès.');
    }

    // Supprimer un prêt existant
    public function destroy( $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Le prêt a été supprimé avec succès.');
    }
}
