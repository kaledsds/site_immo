@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="orange"><b>Modification d'un louer </b></font>
      </h4>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br />
    @endif
    <div class="row">
      <div class="col-12">
        <form name="louer" method="post" action="{{ route('louers.update', $louer->id) }}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-6 ">
              <div class="form-group">
                <label for="floatingSelect">Select Medecins :</label>
                <select name="getImmobilier" class="form-select" id="floatingSelect"
                  aria-label="Floating label select example">
                  <option>Open immobiliers menu</option>
                  @foreach ($immobiliers as $immobilier)
                  <option value="{{ $immobilier->id }}" selected>{{ $immobilier->localisation }}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="text" class="form-control" name="prix" value="{{ $louer->prix }}" />
              </div>
              <div class="form-group">
                <tr>
                  <td>&nbsp;</td>
                  <td>
                    <button style="margin: 1rem;margin-left: 0;" type="submit" class="btn btn-primary">Modification du
                      louer</button>
                  </td>
                </tr>
              </div>
            </div>
            <div class="col-md-6 ">
            </div>
          </div>
        </form>
      </div>



    </div>
    @endsection