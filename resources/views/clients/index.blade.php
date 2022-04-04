@extends('layouts.app')

@section('page_wrapper')
@endsection


@section('content')

        <div class="container content-area relative">
            <h1 class="mt-4 text-white"> Clients</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Ajouter Client
                    </button>                
                </div>
                <div class="card-body">
                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom</th>
                                <th>Secteur</th>
                                <th>Téléphone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td style="cursor:pointer;" onclick="client_prix({{ $client->id }});" >
                                    {{$client->id }}
                                </td>
                                <td style="cursor:pointer;" onclick="client_prix({{ $client->id }});" >{{$client->raison_sociale ?? $client->nom}}</td>
                                <td style="cursor:pointer;" onclick="client_prix({{ $client->id }});" >{{$client->getSecteur() }}</td>                                                
                                <td style="cursor:pointer;" onclick="client_prix({{ $client->id }});" >{{$client->telephone }}</td>                                                
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditModal{{$client->id}}">
                                        Modifier
                                    </button>                                    

                                    <a href="{{route('client.destroy',['client'=>$client->id])}}" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                </td>
                                @include('includes.edit_client',['client'=>$client])

                            </tr>

                            @endforeach                                            
                        </tbody>
                    </table>
                </div>



                
                
            </div>
        </div>



@include('includes.add_client')


@endsection


@section('scripts')

<script>
    
    function client_prix(id_client) 
    {
    
        window.location.href = "/client/edit_prix/"+id_client;

        // fin
    }

    /**/
</script>

<script>
        $(document).ready(function() 
        {
        	var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
	        limit:10,
	        formPrefix : "dynamic_form",
	        normalizeFullForm : false
		});

	    $("#dynamic_form #minus5").on('click', function()
        {
	    	var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
	    	if (initDynamicId === 2) {
	    		$(this).closest('#dynamic_form').next().find('#minus5').hide();
	    	}
	    	$(this).closest('#dynamic_form').remove();
	    });

	    $('#secteurFform').on('submit', function(event)
        {
        	var values = {};
			$.each($('#secteurFform').serializeArray(), function(i, field) {
			    values[field.name] = field.value;
			});
			console.log(values)
    	})
        });



</script>
@endsection
