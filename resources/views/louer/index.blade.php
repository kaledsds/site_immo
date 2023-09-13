@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Gestion des louers</b></font>
    </h4>
  </div>
  <div class="col-md-12">
    <a style="margin: 19px;" href="{{ route('louers.create')}}" class="btn btn-primary"><b>Ajouter un nouveau
        louer</b></a>
  </div>
  <div class="col-md-12">
    <div style="display:block;position:relative;height:300px;overflow:auto;">
      <table class="table table-hover table-condensed ">
        <thead>
          <tr>

            <th style="background-color:orange;">
              <font color="white"><b>Id</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>immobilier localisation</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>prix</b></font>
            </th>
            <th style="background-color:orange; text-align: center;">
              <font color="white"><b>Action</b></font>
            </th>

          </tr>
        </thead>

        <tbody>
          @foreach($louers as $louer)
          <tr>
            <td style="vertical-align:middle;">{{$louer->id}}</td>
            <td style="vertical-align:middle;">{{$louer->immobilier_localisation}}</td>
            <td style="vertical-align:middle;">{{$louer->prix}}</td>
            <td>
              <div style="text-align: center; display: flex; justify-content: center; gap: 5px;">

                <a href="{{ route('louers.edit',$louer->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('louers.destroy', $louer->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">X</button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
    </div>
    <div class="col-sm-12">

      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
    </div>

    @endsection