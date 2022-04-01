<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Wilaya;
use App\Stock;
use App\Secteur;
use App\Fournisseur;
use Hash;
use Response;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\StoreProduit;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class ClientController extends Controller
{


    public function destroyList(Request $request)
    {
        $data = explode(',',  $_GET['id']);
        foreach ($data as $key => $c) {
            if (strlen($c)) {
                $client =  Client::find($c);
                $client->delete();
            }
        }

        return redirect()->back()->with('success', 'les Clients ont été supprimés ');           
    }

    public function index()
    {
        $clients = Client::all();
        $secteurs = Secteur::all();

        return view('clients.index',compact('clients','secteurs'));
    }

    public function state($id_client)
    {
        $client = Client::find($id_client);
        DB::table('clients')
            ->where('id',$client->id)
            ->update(['etat'=>!$client->etat]);            
        return Response::json($client);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurs = Secteur::all();
        return view('clients.create',compact('secteurs'));
    }

    
    public function store(Request $request)
    {
        $client = new Client();
        $client->raison_sociale = $request['raison_sociale'];
        $client->nom = $request['nom'];
        $client->adresse = $request['adresse'];
        $client->secteur = $request['secteur'];
        $client->telephone = $request['telephone'];
        $client->fax = $request['fax'];
        $client->n_registre = $request['n_registre'];
        $client->nif = $request['nif'];
        $client->nis = $request['nis'];
        $client->n_article = $request['n_article'];
        $client->email = $request['email'];
        
        $client->save();
        return redirect()->route('client.index')->with('success', ' inséré avec succés ');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id_client)
    {
        $client = Client::find($id_client);

        return view('clients.view',compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id_client)
    {
        $communes = Commune::all();
        $wilayas =Wilaya::all();
        $client = Client::find($id_client);
        $categories = Categorie::all();
        return view('clients.edit',compact('categories','communes','wilayas','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$client_id)
    {
        $client = Client::find($client_id);  
        $client->raison_sociale = $request['raison_sociale'];
        $client->nom = $request['nom'];
        $client->adresse = $request['adresse'];
        $client->secteur = $request['secteur'];
        $client->telephone = $request['telephone'];
        $client->fax = $request['fax'];
        $client->n_registre = $request['n_registre'];
        $client->nif = $request['nif'];
        $client->nis = $request['nis'];
        $client->n_article = $request['n_article'];
        $client->email = $request['email'];

        $client->save();
        return redirect()->route('client.index')->with('success', 'modifié avec succés ');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_client)
    {
        $client = Client::find($id_client);
        $client->delete();
        return redirect()->route('client.index')->with('success', 'le Client a été supprimé ');        
    }

    public function stock($id_client)
    {
        $client = Client::find($id_client);
        $stocks = Stock::where('produit_id',$client->id)->orderBy('id','desc')->get();
        $clients = Client::all();
        $fournisseurs =Fournisseur::all();
        $communes = Commune::all();
        $wilayas =Wilaya::all();
        return view('stocks.index',compact('produits','stocks','produits','fournisseurs','communes','wilayas'));
    }


    public function printStock($id_client)
    {
        dd('on est entrain de construire cette page ...');
    }


}
