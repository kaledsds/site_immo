@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12">
    <h4>
      <font color="orange"><b>Gestion des immobiliers</b></font>
    </h4>
  </div>
  <div class="col-md-12">
    <a style="margin: 19px;" href="{{ route('immobiliers.create')}}" class="btn btn-primary"><b>Ajouter un nouveau
        immobilier</b></a>
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
              <font color="white"><b>User Name</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Type</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Surface</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Description</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Localisation</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Image a</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Image b</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Image c</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Image d</b></font>
            </th>
            <th style="background-color:orange;">
              <font color="white"><b>Image e</b></font>
            </th>
            <th style="background-color:orange; text-align: center;" colspan="2">
              <font color="white"><b>Action</b></font>
            </th>

          </tr>
        </thead>

        <tbody>
          @foreach($immobiliers as $immobilier)
          <tr>
            <td style="vertical-align:middle;">{{$immobilier->id}}</td>
            <td style="vertical-align:middle;">{{$immobilier->user_name}}</td>
            <td style="vertical-align:middle;">{{$immobilier->type}}</td>
            <td style="vertical-align:middle;">{{$immobilier->surface}}</td>
            <td style="vertical-align:middle;">{{$immobilier->description}}</td>
            <td style="vertical-align:middle;">{{$immobilier->localisation}}</td>
            <td style="vertical-align:middle;">
              <img src="{{ asset('images/' . $immobilier->imageA) }}" alt="" width="50" height="50">
            </td>
            <td style="vertical-align:middle;">
              <img src="{{ asset('images/' . $immobilier->imageB) }}" alt="" width="50" height="50">
            </td>
            <td style="vertical-align:middle;">
              <img src="{{ asset('images/' . $immobilier->imageC) }}" alt="" width="50" height="50">
            </td>
            <td style="vertical-align:middle;"> <img src="{{ asset('images/' . $immobilier->imageD) }}" alt=""
                width="50" height="50">

            </td>
            <td style="vertical-align:middle;">
              <img src="{{ asset('images/' . $immobilier->imageE) }}" alt="" width="50" height="50">
            </td>
            <td>
              <a href="{{ route('immobiliers.edit',$immobilier->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('immobiliers.destroy', $immobilier->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">X</button>
              </form>
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