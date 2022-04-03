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


    public function index()
    {
        $clients = Client::all();
        $secteurs = Secteur::all();

        return view('clients.index',compact('clients','secteurs'));
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

    public function edit_prix($id_client)
    {

        $client = Client::find($id_client);

        $produits = DB::select("select * from produits order by nom");

        return view('clients.edit_prix',compact('produits','client'));

        // code...
    }

    public function edit_prix_post($id_client,Request $request)
    {

        DB::delete("delete from client_prix where id_client = '$id_client'");

        $prix = ($request->all());

        $produits = DB::select("select * from produits order by nom");

        foreach ($produits as $produit) 
        {
            
            $id_produit = $produit->id;

            $price = $prix[$id_produit];

            dump($price);

            DB::insert("insert into client_prix (id_client,id_produit,prix) values('$id_client','$id_produit','$price')");

            //
        }
        
        dd("dd");

        return view('clients.edit_prix',compact('produits','client'));

        // code...
    }


    //
}
