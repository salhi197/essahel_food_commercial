@extends('layouts.app')

@section('page_wrapper')
@endsection


@section('content')

                    <div class="container-fluid">
                        <h1 class="mt-4"> secteurs</h1>
                            <div class="card mb-4">
                                <div class="card-header">
                                </div>

                                <div class="card-body">
                                        <form role="form" action="{{route('client.store')}}" method="post" id="formpost">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >Nom</label>
                                                        <input type="text"  value="{{old('nom')}}" name="nom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >Tél</label>
                                                        <input type="text" value="{{old('telephone')}}" name="telephone" class="form-control">
                                                    </div>

                                                    



                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >Adresse</label>
                                                        <input type="text" value="{{old('adresse')}}" name="adresse" class="form-control">
                                                    </div>
                                            
                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >Fax</label>
                                                        <input type="text" value="{{old('fax')}}" name="fax" class="form-control">
                                                    </div>

                                                
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >Wilaya</label>
                                                        <select class="form-control" value="{{old('wilaya')}}" name="wilaya">
                                                        @foreach($secteurs as $secteur)
                                                            <option value="{{$secteur->id}}">{{$secteur->label ?? ''}}</option>	
                                                        @endforeach
                                                        </select>
                                                    </div>



                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >N° Registre</label>
                                                        <input type="text" id="n_registre" value="{{old('n_registre')}}" name="n_registre" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >N° Nif</label>
                                                        <input type="text" id="nif" value="{{old('nif')}}" name="nif" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >N° Nis</label>
                                                        <input type="text" id="nis" value="{{old('nis')}}" name="nis" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="font-size:15px;" >N° Article</label>
                                                        <input type="text" id="n_article" value="{{old('n_article')}}" name="n_article" class="form-control">
                                                    </div>
                                                </div>


                                            </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button id="valider"  class="btn btn-info btn-block">Valider</button>
                                            </div>
                                        </div>

                                        </form>
                                    </div>

                                



                            </div>
                        </div>





@endsection


@section('scripts')

<script>
        $(document).ready(function() {
        	var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
		        limit:10,
		        formPrefix : "dynamic_form",
		        normalizeFullForm : false
		    });

		    $("#dynamic_form #minus5").on('click', function(){
		    	var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
		    	if (initDynamicId === 2) {
		    		$(this).closest('#dynamic_form').next().find('#minus5').hide();
		    	}
		    	$(this).closest('#dynamic_form').remove();
		    });

		    $('#secteurFform').on('submit', function(event){
	        	var values = {};
				$.each($('#secteurFform').serializeArray(), function(i, field) {
				    values[field.name] = field.value;
				});
				console.log(values)
        	})
        });



</script>
@endsection
