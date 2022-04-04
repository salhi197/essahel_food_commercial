@extends('layouts.app')

@section('content')


<!-- PAGE-HEADER -->
<div class="page-header">
    <h4 class="page-title">Client : {!! $client->nom !!} </h4>
</div>
<!-- PAGE-HEADER END -->






<!-- ROW-1 OPEN -->
<div class="row">

    <div class="col-md-12 col-lg-12">

        <div class="card">

            <div class="card-header">
                
                <div class="card-title">Client : {!! $client->nom !!}
                    
                    <span id="alert" class="alert alert-sccess"> </span> 

                    {{--  --}}
                </div>
            </div>

            <div class="card-body">
                
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

                                        @foreach ($prices as $price)

                                            @if ($price->id_produit == $produit->id)

                                                <?php $le_prix = $price->prix ?>

                                                {{-- expr --}}
                                            @endif

                                            {{-- expr --}}
                                        @endforeach

                                        <td colspan="2">
                                            <input name="{{ $produit->id }}" value="{{ $le_prix ?? '' }}" required type="number" class="form-control">
                                        </td>
                                        <td>DA</td>
                                        

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
    </div>
</div>





@endsection


