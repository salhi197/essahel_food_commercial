<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use App\Commune;
use App\Secteur;
use App\Wilaya;
use App\Sub;
use Response;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
 
    public function index()
    {
        $secteurs = Secteur::all();
        return view('secteurs.index',compact('secteurs'));
    }

    public function store(Request $request)
    {
        $secteur = new Secteur([
            'label' => $request['secteur']
        ]);

        $secteur->save();    
        return redirect()->route('secteur.index')->with('success', 'inserted successfuly ! ');
    }
    public function destroy($secteur)
    {
        $secteur = Secteur::find($secteur);
        $secteur->delete();
        return redirect()->route('secteur.index')
            ->with('success', 'supprimé avec succé !');
    }
    /**
     * 
     */

    public function update(Request $request,$categorie_id)
    {
        $categorie = Secteur::find($categorie_id);
        $categorie->label = $request['secteur'];
        $categorie->save();    
        return redirect()->route('secteur.index')->with('success', 'inserted successfuly ! ');
   }
}
