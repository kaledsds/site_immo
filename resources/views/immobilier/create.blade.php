@extends('layouts.app')

@section('content')
<div class="row" style="width:600px;">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Ajouter un immobilier </b></font>
    </h4>
    <div>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
      @endif
      <form method="post" action="{{ route('immobiliers.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="immobilier">Type:</label>
              <input type="text" class="form-control" name="type" />
            </div>
            <div class="form-group">
              <label for="immobilier">Surface:</label>
              <input type="text" class="form-control" name="surface" />
            </div>
            <div class="form-group">
              <label for="immobilier">Description:</label>
              <input type="text" class="form-control" name="description" />
            </div>
            <div class="form-group">
              <label for="ville">Localisation:</label>
              <input type="text" class="form-control" name="localisation" />
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="image a">Image a:</label>
              <div class="input-group">
                <input name="image_a" type="file" class="form-control" id="inputGroupFile04"
                  aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              </div>
            </div>
            <div class="form-group">
              <label for="image b">Image b:</label>
              <div class="input-group">
                <input name="image_b" type="file" class="form-control" id="inputGroupFile04"
                  aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              </div>
            </div>
            <div class="form-group">
              <label for="image c">Image c:</label>
              <div class="input-group">
                <input name="image_c" type="file" class="form-control" id="inputGroupFile04"
                  aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              </div>
            </div>
            <div class="form-group">
              <label for="image d">Image d:</label>
              <div class="input-group">
                <input name="image_d" type="file" class="form-control" id="inputGroupFile04"
                  aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              </div>
            </div>
            <div class="form-group">
              <label for="image e">Image e:</label>
              <div class="input-group">
                <input name="image_e" type="file" class="form-control" id="inputGroupFile04"
                  aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <button type="submit" class="btn btn-primary">Ajouter l'immobilier</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection