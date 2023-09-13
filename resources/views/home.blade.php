@extends('layouts.app')

@section('content')
<div class="row m-0 p-4">
  <div class="container text-center p-4">
    <div class="row row-cols-5">
      @foreach($immobiliers as $immobilier)
      <div class="col m-3 p-2">
        <div class="card" style="width: 18rem;">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('images/' . $immobilier->imageA) }}" height="140px" class="card-img-top" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/' . $immobilier->imageB) }}" height="140px" class="card-img-top" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/' . $immobilier->imageC) }}" height="140px" class="card-img-top" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/' . $immobilier->imageD) }}" height="140px" class="card-img-top" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/' . $immobilier->imageE) }}" height="140px" class="card-img-top" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$immobilier->user_name}}</h5>
            <p class="card-text">type : {{$immobilier->type}}</p>
            <p class="card-text">surface : {{$immobilier->surface}}</p>
            <p class="card-text">localisation : {{$immobilier->localisation}}</p>
            <p class="card-text">description : {{$immobilier->description}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection