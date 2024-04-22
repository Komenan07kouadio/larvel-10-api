<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return response()->json($etudiants);
    }
    public function store(Request $request)
    {
        try {
            $message=[
                'nom.required'=>"vuillez Entrez votre nom si svp",
                'prenom.required'=>"vuillez Entrez votre prenom si svp",
                'classe.required'=>"vuillez Entrez votre classe si svp"
            ];
            $request->validate(Etudiant::$rules,$message);
            
            $etudiant = Etudiant::create($request->all());
            return response()->json($etudiant, 201);
        } catch (ValidationException $e) {
            return response()->json([$e->errors()], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de la création de l\'étudiant.'], 500);
        }
    }

    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return response()->json($etudiant);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $donnes = $request->all();
        $etudiant->update($donnes);
        return response()->json($etudiant, 200);
    }

    public function destroy($id)
    {
        Etudiant::findOrFail($id)->delete();
        return response()->json(['message' => 'Étudiant supprimé avec succès'], 200);
    }
}
