@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div style="width:800px;">
      <h4>
        <font color="orange"><b>Modification l'immobilier </b></font>
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
        <form name="fannonceur" method="post" action="{{ route('immobiliers.update', $immobilier->id) }}">
          @method('PATCH')
          @csrf

          <div class="card">

            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="id user">Id user:</label>
                  <input type="text" class="form-control" name="id user" value="{{ $immobilier->id user }}" />
                </div>
                <div class="form-group">
                  <label for="type">Type:</label>
                  <input type="text" class="form-control" name="type" value="{{ $immobilier->type }}" />
                </div>
                <div class="form-group">
                  <label for="surface">Surface:</label>
                  <input type="text" class="form-control" name="Surface" value="{{ $immobilier->surface }}" />
                </div>
                <div class="form-group">
                  <label for="nom">Description:</label>
                  <input type="text" class="form-control" name="description" value="{{ $immobilier->description }}" />
                </div>
                <div class="form-group">
                  <label for="ville">Localisation:</label>
                  <input type="text" class="form-control" name="localisation" value="{{ $immobilier->localisation }}" />
                </div>

              </div>
              <div class="col-md-6 ">

                <div class="form-group">
                  <label for="image a">Image a:</label>
                  <input type="text" class="form-control" name="image a" value="{{ $immobilier->image a }}" />
                </div>
                <div class="form-group">
                  <label for="image b">Image b:</label>
                  <input type="text" class="form-control" name="image b" value="{{ $immobilier->image b }}" />
                </div>
                <div class="form-group">
                  <label for="image c">Image c:</label>
                  <input type="text" class="form-control" name="image c" value="{{ $immobilier->image c }}" />
                </div>
                <div class="form-group">
                  <label for="image d">Image d:</label>
                  <input type="text" class="form-control" name="image d" value="{{ $immobilier->image d }}" />
                </div>
                <div class="form-group">
                  <label for="image e">Image e:</label>
                  <input type="text" class="form-control" name="image e" value="{{ $immobilier->image e }}" />
                </div>

                
                        <button type="submit" class="btn btn-primary">Modification l'immobilier</button>
                      </td>
                    </tr>
                  </table>
                </div>





              </div>
            </div>

          </div>
        </form>
      </div>
    </div>

    @endsection