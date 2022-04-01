<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
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
                        <label style="font-size:15px;" >Secteur</label>
                        <select class="form-control" name="secteur">
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
</div>
