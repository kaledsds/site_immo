@extends('layouts.app')

@section('content')
<div class="row" style="width:600px;">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Louer un immobilier </b></font>
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
      <form method="post" action="{{ route('louers.store') }}">
        @csrf
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
              <label for="floatingSelect">Select Immobilier :</label>
              <select name='getImmobilier' class="form-select" id="floatingSelect"
                aria-label="Floating label select example">
                <option selected>Open immobilier menu</option>
                @foreach ($immobiliers as $immobilier)
                <option value='{{ $immobilier->id }}'>
                  {{ $immobilier->localisation }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="immobilier">Prix:</label>
              <input type="text" class="form-control" name="prix" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <button type="submit" class="btn btn-primary">Louer</button>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection