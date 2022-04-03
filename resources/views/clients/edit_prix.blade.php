@extends('layouts.app')

@section('page_wrapper')
@endsection


@section('content')

    <div class="container-fluid ">
        
        <h1 class="text-center" style="color:#ffffff"> Client : {!! $client->nom !!}</h1>
        
        <div class="card mb-4">
        
            <div class="card-header">

                <h3> Edition des Prix pour le client : {!! $client->nom !!} </h3>

                {{--  --}}
            </div>


            <div class="table-responsive">

                <form role="form" action="/client/edit_prix/{{ $client->id }}/edit" method="post" >

                    @csrf

                    <table class="table table-striped table-bordered text-nowrap w-100">
                        
                        <thead class="text-center">
                            <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                {{-- <th>Prix2</th> --}}
                            </tr>
                        </thead>
                        
                        <tbody class="text-center">
                            @foreach ($produits as $produit)
                                <tr>
                                    <td>{{$produit->nom ?? ''}}</td>
                                    <td>
                                        <input name="{{ $produit->id }}" value="{{ $produit->prix_gros ?? '0' }}" {{-- required --}} type="number" name="" class="form-control">
                                    </td>
                                    {{-- <td>{{$produit->nom ?? ''}}</td> --}}
                                </tr>    
                            @endforeach                        
                        </tbody>

                    </table>
                    

                    <input type="submit" value="Valider" class="btn btn-outline-primary col-md-12">
                    
                    {{--  --}}
                </form>
            </div>
        </div>
    </div>





@endsection


@section('scripts')

@endsection
